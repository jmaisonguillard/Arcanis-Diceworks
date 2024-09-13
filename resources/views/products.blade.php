<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Arcanis Diceworks') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner/>

<div class="min-h-screen bg-white">
    <section class="header products relative grid-cols-2">
        <div class="w-full">
            <div class="absolute h-full w-auto z-5 left-1/4 -top-1/3">
                <img class="h-[900px] w-full opacity-10"
                     src="{{ url('/images/emblems/emblem-white-arcanis-diceworks.svg') }}" alt="">
            </div>
            <div class="relative z-10">
                @livewire('navigation-menu')
            </div>
            <div class="flex flex-col justify-center align-middle h-3/4 text-white">
                <h1 class="font-semibold text-6xl leading-[60px] text-white my-16 text-center">{{ __('Products') }}</h1>
                <p class="text-center">
                    Explore Our Unique Collection of Artisan Dice Sets: Each Piece is a Masterful <br /> Blend of Fantasy, Craftsmanship, and Storytelling
                </p>
            </div>
        </div>
    </section>

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        @livewire('products')

        @include('components.footer')
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
