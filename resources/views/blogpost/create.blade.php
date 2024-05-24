<div>
    <form action="{{ isset($blogpost) ? route('blogpost.update', $blogpost->id) : route('blogpost.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($blogpost))
            @method('PUT')
        @endif
        <label for="title"> Post title: </label>
        <input type="text" name="title" id="title" value="{{isset($blogpost) ? $blogpost->title : ''}}"/>

        <label for="intro"> Post intro: </label>
        <input type="text" name="intro" id="intro" value="{{isset($blogpost) ? $blogpost->intro : ''}}"/>

        <label for="content"> Post content: </label>
        <input type="text" name="content" id="content" value="{{isset($blogpost) ? $blogpost->content : ''}}"/>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <button type="submit">Submit</button>
    </form>
</div>
