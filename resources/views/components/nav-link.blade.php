@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out font-bold text-white'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out font-normal';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
