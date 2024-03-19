<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Poll;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('member')) {
            $userId = auth()->id();

            $polls = Poll::with('options')->where(function ($query) use ($userId) {
                $query->whereNull('deadline')
                    ->orWhere('deadline', '>', Carbon::now());
            })->whereDoesntHave('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $polls = Poll::with('options')->orderBy('created_at', 'desc')->get();

        }
        return view('polls.index', compact('polls'));
    }
    public function details()
    {
        $polls = Poll::with(['options', 'options.votess.user'])->orderBy('created_at', 'desc')->get();

        return view('polls.details', compact('polls'));
    }

    public function generatePDF($id)
    {
        $data['polls'] = Poll::with(['options', 'options.votess.user'])->where('id', $id)->first();

        $pdf = Pdf::loadView('polls.pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);

        // return $pdf->download('filename.pdf');
        return $pdf->stream();
        // return view('polls.pdf', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'deadline' => 'nullable|date|after:now',
        ]);
        $poll = Poll::create(['question' => $request->question, 'deadline' => $request->deadline]);

        foreach ($request->options as $option) {
            $poll->options()->create(['options' => $option]);
        }

        return redirect()->route('polls.index')->with('success', 'Poll created successfully!');
    }

    public function vote(Request $request, Poll $poll)
    {
        // dd($request->all(), $poll);
        $request->validate([
            'option_id' => 'required|exists:options,id',
        ]);

        if (!$poll->isOpenForVoting()) {
            return redirect()->back()->with('error', 'Voting for this poll is closed.');
        }
        if ($request->user()->hasVoted($poll)) {
            return redirect()->back()->with('error', 'You have already voted for this poll!');
        }

        // Save the vote and mark the user as voted for this poll
        $option = Option::find($request->option_id);
        $option->increment('votes');

        $request->user()->markAsVoted($poll, $request->option_id);

        return redirect()->back()->with('success', 'Thank you for your vote!');
    }

    // Inside PollController.php
    public function show(Poll $poll)
    {
        $poll->load('options', 'comments.user');

        return view('polls.show', compact('poll'));
    }

    public function destroy(Poll $poll){
        $poll->delete();

        return redirect()->back()
                ->with('success','Poll deleted Successfully');
    }


}
