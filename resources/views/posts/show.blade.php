@extends('layouts.app')

@section('content')
    <div class="card col-12">
        <h2>{{$post->title}}</h2>
        <p>{{$post->intro}}</p>
        <p>{{$post->content}}</p>
        <small>{{$post->author}}</small>
        <small>{{$post->created_at}}</small>
        <div class="d-flex">
            <a href="{{route('posts.edit', [$post])}}" class="btn btn-sm btn-light">Szerkesztés</a>
            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
            </form>
        </div>
    </div>

    <form action="{{route('comments.store')}}" method="post" class="form-group mt-3">
        @csrf
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="text" name="content" id="content" class="form-control">
        <button type="submit" class="btn btn-sm btn-success">Komment</button>
    </form>

    <div class="mt-2">
        {{$comments->links()}}
        @foreach($comments as $comment)
            <div class="card col-10 mt-2">
                <p>{{$comment->content}}</p>
            </div>
        @endforeach
    </div>
@endsection
