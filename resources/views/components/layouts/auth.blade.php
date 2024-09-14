<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->
    @yield('meta-data')

    <!-- Open Graph Meta Tags (for social media) -->
    @yield('og-data')

    <!-- Twitter Card Meta Tags -->
    @yield('twitter-card-data')

    <title>@yield('title', config('app.name', 'Arcanis Diceworks'))</title>

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

<div class="min-h-screen bg-bunker text-white h-full">

    <!-- Page Content -->
    <main class="min-h-screen h-full flex flex-1 flex-col justify-center">
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
