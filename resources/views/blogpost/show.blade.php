<h1>Cím: {{$blogpost->title}}</h1>
<h3>Intro: {{$blogpost->intro}}</h3>
<p>Content: {{$blogpost->content}}</p>
<small>Author: {{$blogpost->user->name}}</small>

<a href="{{route("blogpost.edit", [$blogpost])}}">Edit</a>
<form action="{{ route('blogpost.destroy', $blogpost->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Destroy</button>
</form>


@foreach ($comments as $comment)
        <div style="border: 1px solid blue;">
            <p>{{ $comment->content }}</p>
            <span>{{ $comment->id }}</span>
        </div>
@endforeach
{{ $comments->links() }}


<form action="{{route('comment.store')}}" method="POST">
    @csrf
    <label for="content"> Komment: </label>
    <textarea name="content" id="content"></textarea>
    <input type="hidden" name="blogpost_id" id="blogpost_id" value="{{$blogpost->id}}">
    <button type="submit">Submit comment</button>
</form>

