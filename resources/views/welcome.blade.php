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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-white">
    <section class="header relative grid-cols-2">
        <div class="w-full">
            <div class="absolute left-[-200px] h-full z-5">
                <img class="h-full w-full opacity-10" src="{{ url('images/emblems/emblem-white-arcanis-diceworks.svg') }}" alt="">
            </div>
            <div class="absolute top-0 left-1/2 h-full z-10">
                <img class="h-full w-586 object-cover" src="{{ url('images/stock/header-dice.png') }}" alt="">
            </div>
            <div class="relative z-10">
                @livewire('navigation-menu')
            </div>
            <div class="p-32 pl-64 w-1/2 h-800 flex flex-col justify-center">
                <h1 class="text-6xl text-white font-bold">{{ __('Where Fantasy Meets Artisan Craft') }}</h1>
                <p class="pt-2 text-white">{{ __('Handcrafted Resin Dice Infused with Dark Fantasy and Horror, Tailored for the Discerning D&D Player and Collector') }}</p>
            </div>
            <div class="grid grid-cols-2 w-full">
                <div class="bg-heliotrope p-8 relative">
                    <div class="grid grid-cols-2">
                        <div class="relative left-[14rem]">
                            <h2 class="text-4xl text-white font-bold">{{ __('Make Every Roll Legendary!') }}</h2>
                            <p class="text-white pt-2">{{ __('Choose colors, engravings, and styles that resonate with your inner dragon.') }}</p>
                        </div>
                        <div class="flex justify-end items-end align-bottom">
                            <a href="#" class="bg-white rounded-full w-20 h-20 justify-center items-center align-middle flex">
                                <img class="w-8" src="{{ url('images/svgs/arrow-down-right.svg') }}" alt="Arrow Down Right">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white"></div>
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
        <div>
            @livewire('featured-products')
        </div>
        <div class="bg-dice-banner bg-cover w-full text-white text-center py-16 px-[36rem] flex flex-col items-center min-h-[500px] relative">
            <div class="h-full w-full bg-bunker absolute top-0 bottom-0 bg-opacity-30"></div>
            <h3 class="font-bold text-[54px] line leading-[68px] z-5">
                {{ __('Create Your Legendary Roll!') }}
            </h3>
            <p class="z-5">
                {{ __("Customize your Dungeons & Dragons dice to match your unique character. Choose colors, designs, and engravings for an adventure that's truly your own.") }}
            </p>
            <a href="#" class="rounded-full bg-white text-bunker flex flex-row justify-center items-center py-2 px-4 mt-4 w-fit z-5">
                {{ __('Customize Your Dice') }}
                <div class="bg-bunker text-white rounded-full w-8 h-8 flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </div>
            </a>
        </div>
        <div>
            @livewire('new-products')
        </div>

        @include('components.footer')
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
