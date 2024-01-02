@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://robohash.org/{{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full" />

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <x-form.textarea name='body' />

            <div class="flex justify-end mt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-500 hover:underline">Register</a> or
        <a href="/login" class="text-blue-500 hover:underline">log in</a> to leave a comment.
    </p>
@endauth
