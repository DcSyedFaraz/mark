<?php

namespace App\Http\Controllers\voting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $blogs = Post::where('type',1)->get();
        return view('voting.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('voting.blogs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'user_id' => 'required',
        ]);

        Post::create($validatedData);

        return redirect('/voting/blogs')->with('success', 'Blog created successfully.');
    }

    public function show(Post $blog)
    {
        return view('voting.blogs.show', compact('blog'));
    }

    public function edit(Post $blog)
    {
        return view('voting.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Post $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->update($validatedData);
        return redirect('voting/blogs')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Post $blog)
    {
        $blog->delete();
        return redirect('/voting/blogs')->with('success', 'Blog deleted successfully.');
    }
}
