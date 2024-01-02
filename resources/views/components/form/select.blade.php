@props(['name', 'items', 'labelText' => $name])

<x-form.field>
    <x-form.label name="{{ $name }}" labelText="{{ $labelText }}" />

    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes }}>
        @foreach ($items as $item)
            <option
                value="{{ $item->id }}"
                {{ old($name) == $item->id ? 'selected' : '' }}
            >{{ ucwords($item->name) }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</x-form.field>
