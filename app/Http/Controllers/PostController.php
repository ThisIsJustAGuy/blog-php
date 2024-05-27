<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('home', [
            'latest_posts' => Post::query()->with('comments')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('posts.edit');
    }

    public function store(PostRequest $request)
    {
        Post::query()->create($request->validated());
        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->paginate(5);
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('home');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home');
    }
}
