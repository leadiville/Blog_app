@include('/blog/blogParts/head')

<div class="content has-text-left pt-6 p-2">
    <a class="content is-small has-text-primary is-dark ml-0" href="{{ route('dashboard') }}"><i>Go to Dashboard</i></a>

</div>
<header class="header m-6 has-text-centered">
    <h1 class="title">All Articles</h1>
    <hr>
</header>
@if (session()->has('destroy_message'))
    <div class="notification is-danger has-text-centered">
        {{ session()->get('destroy_message') }}
    </div>
@elseif (session()->has('update_message'))
    <div class="notification is-link has-text-centered">
        {{ session()->get('update_message') }}
    </div>
@elseif (session()->has('create_message'))
    <div class="notification is-success has-text-centered">
        {{ session()->get('create_message') }}
    </div>
@else
@endif

<section class="container has-text-left">
    <a class="button is-primary is-rounded has-text-black ml-6" href="{{ route('blog.create') }}">New
        Article</a>
</section>

@if (isset($posts))

    @foreach ($posts as $post)
        <div class="card m-6 p-6 has-text-left " onclick="() {{ route('blog.show', $post->id) }}">
            <a href={{ route('blog.show', $post->id) }} class="has-text-black">
                <p class="subtitle card-item is-capitalized">
                    <strong>{{ $post->title }}</strong>
                </p>
                <p class="content card-item is-capitalized">{{ $post->excerpt }}</p>
                <p class="content is-small card-item"><strong>Made by: <i
                            class="has-text-primary">{{ $post->user->name }}</i>
                        on:
                        {{ $post->created_at->format('d/m/Y') }}</strong></p>
                </p>
            </a>
            <br />
        </div>
    @endforeach
@else
    <div class="card is-warning p-6 m-6">
        <div class="card-head">
            <p class="has-text-danger">No Posted Article Yet</p>
        </div>
        <div class="card-body">
            <p class="content is-small mt-4">There are no posts yet. Click on the "New Article" button to create a new
                post...</p>
        </div>
    </div>
@endif

@include('blog/blogParts/foot')
