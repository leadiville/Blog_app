@extends("blog.template")

@section('content')
<div class="container m-6">`
    <h1 class="title">Add new post</h1>
    <hr>
    @if ($errors->any())
        <div class="notification is-danger is-light">
            <p class="content has-text-dark"><strong>Something has gone wrong...</strong></p>
            @foreach ($errors->all() as $error)
                <ul>
                    <li class="has-text-danger is-light"><i>{{ $error }}<i></li>
                </ul>
            @endforeach
        </div>
    @endif

    <form action={{ route('blog.store') }} method="POST" enctype="multipart/form-data" class="form has-text-left m-4">
        @csrf
        <div class="field">
            <label class="label" for="is_published">is_published</label>
            <div class="control">
                <input type="checkbox" class="checkbox" name="is_published" >
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input type="text" class="input" placeholder="Title..." name="title">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" name="excerpt" placeholder="Excerpt...">
            </div>
        </div>
        <div class="field">
            <label for="min_to_read" class="label">min to read</label>
            <div class="control">
                <select class="select" name="min_to_read" type="number" name="min_to_read" min="1">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                    <option>50</option>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea class="textarea" placeholder="Body..." name="body"></textarea>
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