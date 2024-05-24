<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogpostRequest;
use App\Http\Resources\BlogpostResource;
use App\Http\Resources\CommentResource;
use App\Models\Blogpost;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogpostsController extends Controller
{

    public function show(Blogpost $blogpost): View
    {
        $comments = $blogpost->comments()->latest()->paginate(2);
        return view('blogpost.show', [
            'blogpost' => $blogpost,
            'comments' => $comments,
//            'comments' => $book->comments()->paginate(5),
        ]);
    }


    public function create(): View
    {
        return view('blogpost.create');
    }

    public function edit(Blogpost $blogpost): View
    {
        return view('blogpost.create', ['blogpost' => $blogpost,]);
    }

    public function store(BlogpostRequest $request)
    {
        Blogpost::query()->create($request->validated());

        return redirect()->route('home')->with('success', 'Sikeres mentés');
    }

    public function update(BlogpostRequest $request, Blogpost $blogpost)
    {
        $validated = $request->validated();

//        if ($request->has('image')) {
//            if ($book->image_url) {
//                Storage::disk('images')->delete($book->image_url);
//            }
//        }
//
//        if (isset($validated['delete-image'])) {
//            Storage::disk('images')->delete($book->image_url);
//            $validated['image_url'] = null;
//        }

        $blogpost->update($validated);
        return redirect()->route('home')->with('success', 'Sikeres mentés');
    }

    public function destroy(Blogpost $blogpost) {
        $blogpost->delete();
        return redirect()->route('home')->with('success', 'Sikeres mentés');
    }
}
