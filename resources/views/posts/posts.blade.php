@extends('layouts.app')

@section('content')
    <main class="posts-wrapper">
        @foreach ($posts as $post)
            <article class="{{ $loop->even ? 'post post--even' : 'post' }}">
                <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </main>
@endsection
