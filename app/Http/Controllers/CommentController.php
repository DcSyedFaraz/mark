<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poll;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $poll = Poll::find($request->poll);
        // dd($request->all(), $poll);
        $request->validate([
            'body' => 'required|string',
        ]);

        // Create a new comment
        $comment = new Comment([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);
        $poll->comments()->save($comment);
        // $comment->poll_id = $poll->id;
        // $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
