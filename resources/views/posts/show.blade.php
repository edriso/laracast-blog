<x-layout>
    @slot('title', $post->title)
    <article class="post">
        <h2>{{ $post->title }}</h2>

        <p>
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
            in <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        </p>

        {!! $post->body !!}
    </article>

    <a href="/">Go Back</a>
</x-layout>
