<x-layout>
    <main class="posts-wrapper">
        @foreach ($posts as $post)
            <article class="{{ $loop->even ? 'post post--even' : 'post' }}">
                <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>

                <p>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    in <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                </p>

                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </main>
</x-layout>
