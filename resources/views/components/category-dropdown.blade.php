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
        {{-- href="/?{{ http_build_query(request()->except('category', 'page')) }}" --}}
        href="{{ request()->fullUrlWithQuery(['category' => null, 'page' => null]) }}"
        :active="!$currentCategory"
    >All</x-dropdown-item>
    @foreach ($categories as $category)
    <x-dropdown-item
            {{-- href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}" --}}
            href="{{ request()->fullUrlWithQuery(['category' => $category->slug, 'page' => null]) }}"
            :active="$category->is($currentCategory)"
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>
