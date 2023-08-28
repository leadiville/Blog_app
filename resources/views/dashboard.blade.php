<x-app-layout>
    @include('blog/blogParts/head')
    <x-slot name="header">
        <div class="text-gray p-0 has-text-right">
            <button class="button"><a href="{{ route('blog.index') }}">Go to
                posts</a></button>
            </div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in") }} as {{ Auth::user()->name }}.
                </div>
                    @foreach (Auth::user()->posts as $userPost)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('blog.show', $userPost->id) }}">{{ $userPost->title }}</a>
                        {{ $userPost->created_at->format('d/m/Y') }}
                    </div>
                @endforeach

                <div class="p-6 text-gray-900 dark:text-gray-100">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
