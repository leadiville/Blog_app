
@extends('blog.template')

@section('content')
<div class="content has-text-left pt-6 is-capitalized">
    <a class="content is-small has-text-primary has-icon-left mb-6" href={{ route('blog.index') }}><i>Go to all
            Posts</i></a>

    <header class="header mt-6">
        <p class="title m-4">{{ $selected_post->title }}</p>
    </header>


    <p class="content is-small mt-6 mb-6">Made by: <strong class="has-text-primary"> {{ $selected_post->user->name }}
        </strong> {{ $selected_post->created_at }}</p>
    <p class='content is-small'>Categories: </p>
    @if (count($selected_post->categories) > 0)
        @foreach ($selected_post->categories as $category)
            <ul>
                <li class="content is-small has-text-primary">
                    {{ $category->title }}
                </li>
            </ul>
        @endforeach
        @else 
        <p class="content is-small has-text-danger pl-6 ">This post does not belong to any category yet!</p>
    @endif

    <p class="subtitle mt-4 mb-4"><strong>{{ $selected_post->excerpt }}</strong></p>
    <p class="content is-small mt-2 mb-2">{{ $selected_post->body }}</p>
    <br />
    <img class="image" src={{ asset('images/' . $selected_post->image_filename) }}
        alt="image for {{ $selected_post->title }}" width='400' height='350' >
    @if (Auth::id() === $selected_post->user_id)
        <div class="content is-flex pb-6">
            <a class="button mt-2 card-item has-text-primary"
                href={{ Auth::id() === $selected_post->user_id ? route('blog.edit', $selected_post->id) : null }}><sup>Edit</sup></a>

            <form method="POST" action="{{ route('blog.destroy', $selected_post->id) }}">
                @csrf
                @method('DELETE')
                <button class="button m-2 card-item has-text-danger">Delete</button>
            </form>
        </div>
    @endif
</div>
@endsection