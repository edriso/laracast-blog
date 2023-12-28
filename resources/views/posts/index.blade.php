<x-layout>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-card-featured />

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
    </main>

    {{-- <main class="posts-wrapper">
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
    </main> --}}
</x-layout>
