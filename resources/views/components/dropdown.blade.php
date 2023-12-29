@props(['trigger'])

<div
    x-data="{show: false}"
    @click.outside="show=false"
>
    {{-- Trigger --}}
    <div @click="show = !show" class="py-2 px-3 text-sm">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div
        x-show="show"
        class="py-2 text-left text-sm absolute bg-gray-100 w-full mt-4 rounded-xl left-0 z-50 overflow-auto max-h-52"
        style="display: none"
    >
        {{ $slot }}
    </div>
</div>
