@extends('layouts.app')

@section('content')

    <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="post" class="form-group">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <label for="title">Cím</label>
        <input type="text" name="title" id="title" class="form-control" value="{{isset($post) ? $post->title : ''}}">
        <br>

        <label for="intro">Bevezető</label>
        <input type="text" name="intro" id="intro" class="form-control" value="{{isset($post) ? $post->intro : ''}}">
        <br>

        <label for="content">Tartalom</label>
        <textarea name="content" id="content" class="form-control">{{isset($post) ? $post->content : ''}}</textarea>
        <br>

        <label for="author">Szerző</label>
        <input type="text" name="author" id="author" class="form-control" value="{{isset($post) ? $post->author : ''}}">
        <br>

        <button type="submit" class="btn btn-success">Posztolás</button>
    </form>

@endsection
