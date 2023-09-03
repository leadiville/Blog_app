-- Active: 1692575068306@@127.0.0.1@3306@blog_posts
@extends("blog.template")

@section('content')
<div class="container m-6">
    <h1 class="title">Edit post</h1>
    <hr>
    @if ($errors->any())
        <div class="notification is-warning">
            Something has gone wrong...
            @foreach ($errors->all() as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        </div>
    @endif

    <form action={{ route('blog.update', $post->id) }} method="POST" enctype="multipart/form-data" class="form has-text-left m-4">
        @csrf
        @method('PATCH')
        <div class="field">
            <label class="label" for="is_published">is_published</label>
            <div class="control">
                <input value={{ $post->is_published }} type="checkbox" class="checkbox" name="is_published" >
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input value="{{ $post->title }}" type="text" class="input" placeholder="Title..." name="title">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input  value="{{$post->excerpt}}" class="input" type="text" name="excerpt" placeholder="Excerpt...">
            </div>
        </div>
        <div class="field">
            <label for="min_to_read" class="label">min to read</label>
            <div class="control">
                <input name="min_to_read" type="number" value= {{ $post->min_to_read }} class="input">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea class="textarea" placeholder="Body..." name="body">{{ $post->body }}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input type="file" name="image" class="file">
            </div>
        </div>
        <button type="submit" class="button mt-4 is-link is-rounded">SUBMIT POST</button>
    </form>
</div>
@endsection
