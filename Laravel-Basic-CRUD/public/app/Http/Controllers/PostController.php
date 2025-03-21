<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::all(); // Show all posts
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);
    auth()->user()->posts()->create($validated);
    return redirect()->route('posts.index')->with('success', 'Post created!');
}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post); // Authorization check
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post); // Authorization check
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); // Authorization check
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function like(Post $post)
    {
        auth()->user()->reactTo($post, 'Like');
        return redirect()->route('posts.index')->with('success', 'Post liked!');
    }

    public function unlike(Post $post)
    {
        auth()->user()->unreactTo($post, 'Like');
        return redirect()->route('posts.index')->with('success', 'Post unliked!');
    }

    public function follow(Post $post)
    {
        auth()->user()->reactTo($post, 'Follow');
        return redirect()->route('posts.index')->with('success', 'Now following post!');
    }

    public function unfollow(Post $post)
    {
        auth()->user()->unreactTo($post, 'Follow');
        return redirect()->route('posts.index')->with('success', 'Stopped following post!');
    }
}