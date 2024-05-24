<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogpostRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Blogpost;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentsController extends Controller
{

    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

        Comment::query()->create($validated);

        return redirect()->route('blogpost.show', $validated['blogpost_id']);
    }
}
