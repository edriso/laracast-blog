@extends('layouts.app')

@section('content')
    <article class="post">
        <h2>{{ $post->title }}</h2>
        {!! $post->body !!}
    </article>

    <a href="/">Go Back</a>
@endsection
