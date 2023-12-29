<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>
                <x-slot name="trigger">
                    <button
                        class="flex font-semibold items-center justify-between gap-1 w-32 min-w-full"
                    >
                        <span>
                            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                        </span>
                        <x-icon name='down-arrow' class="pointer-events-none" />
                    </button>
                </x-slot>

                <x-dropdown-item
                    href="/"
                    {{-- :active="!isset($currentCategory)" --}}
                    :active="request()->routeIs('home')"
                >All</x-dropdown-item>
                @foreach ($categories as $category)
                    <x-dropdown-item
                        href="/categories/{{ $category->slug }}"
                        {{-- :active="isset($currentCategory) && $currentCategory->is($category)" --}}
                        {{-- :active="request()->is('*' . $category->slug)" --}}
                        {{-- :active='request()->is("categories/{$category->slug}")' --}}
                        :active="request()->is('categories/' . $category->slug)"

                    >{{ ucwords($category->name) }}</x-dropdown-item>
                @endforeach
            </x-dropdown>
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}"
                />
            </form>
        </div>
    </div>
</header>
