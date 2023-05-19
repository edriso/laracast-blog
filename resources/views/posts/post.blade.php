<x-layout>
    @slot('title', $post->title)
    <article class="post">
        <h2>{{ $post->title }}</h2>
        {{-- {!! $post->body !!} --}}
        <p>{{ $post->body }}</p>
    </article>

    <a href="/">Go Back</a>
</x-layout>
