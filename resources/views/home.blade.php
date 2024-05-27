@extends('layouts.app')

@section('content')

    <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary">Új poszt</a>

    {{$latest_posts->links()}}

    <div class="d-flex flex-wrap justify-content-around">
        @foreach($latest_posts as $post)
            <div class="card col-5">
                <h2>{{$post->title}}</h2>
                <p>{{$post->intro}}</p>
                <small>{{$post->author}}</small>
                <small>{{$post->created_at}}</small>
                <div class="d-flex">
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-info">Részletek</a>
                    <a href="{{route('posts.edit', [$post])}}" class="btn btn-sm btn-light">Szerkesztés</a>
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
