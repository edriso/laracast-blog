@props(['active' => false])

@php
    // $classes = ($active ? 'bg-blue-500 text-white' : '') . ' block px-3 leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white'
    $defaultClasses = 'block px-3 leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';

    // if($active) $defaultClasses .= ' bg-blue-500 text-white';
    $activeClasses = 'bg-blue-500 text-white';
@endphp

<a
    {{-- {{ $attributes(['class' => $defaultClasses])}} --}}
    {{ $attributes->class([$defaultClasses, $activeClasses => $active])}}
>
    {{ $slot }}
</a>
