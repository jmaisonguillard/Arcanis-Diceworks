@props(['color' => 'dark'])

@php
    $isDark = $color === 'dark';
@endphp

<button type="submit" class="rounded-full {{ $isDark ? 'bg-bunker text-white' : 'bg-white text-bunker' }} flex flex-row justify-center items-center py-2 px-4">
    {{ $slot }}
    <div class="{{ $isDark ? 'bg-white text-bunker' : 'bg-bunker text-white' }} rounded-full w-8 h-8 flex justify-center items-center ml-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
        </svg>
    </div>
</button>
