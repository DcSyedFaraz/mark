<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::with('options')->orderBy('created_at','desc')->get();
        return view('polls.index', compact('polls'));
    }

    public function store(Request $request)
    {
        $poll = Poll::create(['question' => $request->question]);

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

        // Check if the user has already voted for this poll
        if ($request->user()->hasVoted($poll)) {
            return redirect()->back()->with('error', 'You have already voted for this poll!');
        }

        // Save the vote and mark the user as voted for this poll
        $option = Option::find($request->option_id);
        $option->increment('votes');

        $request->user()->markAsVoted($poll);

        return redirect()->back()->with('success', 'Vote submitted successfully!');
    }

    // Inside PollController.php
    public function show(Poll $poll)
    {
        $poll->load('options', 'comments.user');

        return view('polls.show', compact('poll'));
    }




}
