<x-layout>
    @slot('title', $post->title)
    <article class="post">
        <h2>{{ $post->title }}</h2>
        {!! $post->body !!}
    </article>

    <a href="/">Go Back</a>
</x-layout>
