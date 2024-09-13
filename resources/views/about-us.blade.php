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
    <section class="header relative grid-cols-2">
        <div class="w-full">
            <div class="absolute h-full w-auto z-5 left-1/4 -top-1/3">
                <img class="h-[900px] w-full opacity-10"
                     src="{{ url('/images/emblems/emblem-white-arcanis-diceworks.svg') }}" alt="">
            </div>
            <div class="relative z-10">
                @livewire('navigation-menu')
            </div>
            <h1 class="font-semibold text-6xl leading-[60px] text-white my-16 text-center">{{ __('About Us') }}</h1>
            <div class="flex flex-row gap-x-4 max-w-7xl mx-auto text-white relative z-10">
                <div class="bg-heliotrope border border-mine p-12">
                    <div class="py-4">
                        <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28.5987 19.8884C29.3833 19.8884 30.0187 19.2526 30.0187 18.4684C30.0187 17.6842 29.3833 17.0483 28.5987 17.0483C22.3248 17.0483 17.2388 22.1344 17.2388 28.4087C17.2388 34.6826 22.3248 39.7686 28.5987 39.7686C34.873 39.7686 39.9591 34.6826 39.9591 28.4087C39.9591 27.6241 39.3232 26.9887 38.539 26.9887C37.7548 26.9887 37.119 27.6241 37.119 28.4087C37.119 33.1142 33.3046 36.929 28.5987 36.929C23.8932 36.929 20.0784 33.1142 20.0784 28.4087C20.0784 23.7028 23.8932 19.8884 28.5987 19.8884Z"
                                fill="white"/>
                            <path
                                d="M55.6931 19.9742C55.4465 19.2291 54.6428 18.8251 53.8973 19.0717C53.1693 19.3126 52.7639 20.0877 52.9809 20.8231C57.2276 34.3464 49.7076 48.7517 36.1844 52.9984C22.6616 57.245 8.25625 49.7251 4.0096 36.2018C-0.237486 22.6786 7.28288 8.27325 20.8057 4.0266C25.8117 2.45477 31.1788 2.45477 36.1844 4.0266C36.9359 4.2532 37.7288 3.82784 37.9554 3.07628C38.1785 2.33603 37.7693 1.55359 37.0338 1.31438C22.0179 -3.39678 6.0255 4.95692 1.31434 19.9733C-3.39681 34.9892 4.95731 50.9816 19.9733 55.6927C34.9896 60.4039 50.9816 52.0502 55.6927 37.0338C57.435 31.4807 57.435 25.5273 55.6931 19.9742Z"
                                fill="white"/>
                            <path
                                d="M31.3033 10.1451C31.3107 9.33661 30.6896 8.66073 29.8833 8.60027C29.4592 8.56418 29.0347 8.52808 28.5994 8.52808C17.6196 8.52808 8.71875 17.4289 8.71875 28.4087C8.71875 39.3881 17.6196 48.2889 28.5994 48.2889C39.5787 48.2889 48.4796 39.3881 48.4796 28.4087C48.4796 27.8951 48.4483 27.3818 48.3852 26.8721C48.2717 26.0927 47.548 25.553 46.7686 25.6665C45.9892 25.7796 45.4494 26.5037 45.5625 27.2831C45.5668 27.3127 45.5721 27.3418 45.5782 27.3714C45.609 27.7154 45.6395 28.0564 45.6395 28.4078C45.6399 37.8193 38.0108 45.4484 28.5998 45.4492C19.1884 45.4497 11.5593 37.8201 11.5588 28.4091C11.5584 18.9981 19.1871 11.3686 28.5985 11.3682H28.5989C28.9512 11.3682 29.2927 11.3986 29.6358 11.4291L29.902 11.4512C30.644 11.483 31.2712 10.9071 31.3025 10.1652C31.3029 10.1582 31.3029 10.1517 31.3033 10.1451Z"
                                fill="white"/>
                            <path
                                d="M37.1192 12.7883V17.8804L27.5951 27.4045C27.031 27.9495 27.0154 28.8485 27.5603 29.4126C28.1053 29.9767 29.0043 29.9923 29.5684 29.4474C29.5802 29.4361 29.5919 29.4243 29.6032 29.4126L39.1273 19.8885H44.2194C44.5961 19.8885 44.9571 19.7389 45.2237 19.4723L53.7435 10.952C54.2981 10.3975 54.2981 9.49846 53.7435 8.94393C53.4774 8.67775 53.1164 8.52813 52.7397 8.52813H48.4796V4.268C48.4796 3.48382 47.8437 2.84795 47.0591 2.84839C46.6829 2.84839 46.3219 2.998 46.0557 3.26418L37.5354 11.7845C37.2688 12.0506 37.1192 12.4116 37.1192 12.7883ZM39.9593 13.3763L45.6395 7.69611V9.94818C45.6395 10.7324 46.2754 11.3682 47.0595 11.3682H49.3116L43.6314 17.0484H39.9593V13.3763Z"
                                fill="white"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-3xl leading-[38px] pb-4">{{ __('Our Mission') }}</h3>
                    <p>{{ __('At Arcanis Diceworks, we are dedicated to elevating the art of dice-making to new heights. Our mission is to craft bespoke Dungeons & Dragons (D&D) dice sets that blend intricate artistry with the thrill of fantasy and horror. Each dice set we create is a testament to our commitment to both aesthetic beauty and functional durability.') }}</p>
                </div>
                <div class="bg-cinder border border-mine p-12">
                    <div class="py-4">
                        <svg width="54" height="61" viewBox="0 0 54 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.4576 6.60025L29.5478 2.61089C28.1375 1.7967 26.3999 1.7967 24.9895 2.61089L4.27906 14.568C2.86873 15.3822 2 16.887 2 18.5155V42.4298C2 44.0583 2.86884 45.5632 4.27906 46.3774L24.9894 58.3346C26.3998 59.1489 28.1373 59.1489 29.5477 58.3346L50.258 46.3775C51.6684 45.5633 52.5371 44.0584 52.5371 42.4299V18.5156C52.5371 16.8871 51.6683 15.3823 50.258 14.5681L39.9337 8.60731"
                                stroke="white" stroke-width="2.2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M51.6077 15.7575L27.2686 12.455" stroke="white" stroke-width="2.2"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M52.0092 44.555L43.1396 36.0525L52.1579 16.6985" stroke="white" stroke-width="2.2"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.37988 16.6985L11.3981 36.0525L2.5286 44.555" stroke="white" stroke-width="2.2"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M27.2688 2V12.455L2.92969 15.7576" stroke="white" stroke-width="2.2"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.3576 36.0525H43.139L27.2683 12.455L11.3975 36.0525H18.3474" stroke="white"
                                  stroke-width="2.2" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M27.7627 58.9162L43.1398 36.0527" stroke="white" stroke-width="2.2"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.3975 36.0527L26.7746 58.9162" stroke="white" stroke-width="2.2"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-3xl leading-[38px] pb-4">{{ __('Our Craft') }}</h3>
                    <p>{{ __('We specialize in handcrafted resin dice sets that are far more than just game tools. Our process involves meticulous design and artisanal craftsmanship, resulting in unique pieces that feature embedded elements such as skulls, runes, and other thematic details. Our limited edition collections are designed to captivate and inspire, ensuring that every set is a work of art.') }}</p>
                </div>
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
        <section class="max-w-7xl mx-auto flex flex-row my-32">
            <div class="w-1/2">
                <h2 class="font-bold text-5xl">{{ __('Who We Serve') }}</h2>
                <p class="font-normal text-[16px]">{{ __('Our creations cater to a diverse group of enthusiasts:') }}</p>
            </div>
            <div class="w-1/2">
                <section aria-labelledby="details-heading">
                    <h2 id="details-heading" class="sr-only">Additional details</h2>

                    <div class="divide-y divide-gray-200 border-t">
                        <div x-data="{ open: true }">
                            <h3>
                                <button type="button" x-description="Expand/collapse question button"
                                        class="group relative flex w-full items-center justify-between py-6 text-left"
                                        aria-controls="disclosure-1" @click="open = !open" aria-expanded="false"
                                        x-bind:aria-expanded="open.toString()">
                                    <span class="text-sm font-bold text-gray-900" x-state:on="Open"
                                          x-state:off="Closed"
                                          :class="{ 'font-bold': open, 'text-gray-900': !(open) }">{{ __('D&D Players') }}</span>
                                    <span class="ml-6 flex items-center">
                        <svg class="h-6 w-6 text-gray-400 group-hover:text-gray-500 block" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'hidden': open, 'block': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        <svg class="h-6 w-6" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'block': open, 'hidden': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"></path>
                        </svg>
                      </span>
                                </button>
                            </h3>
                            <div class="prose prose-sm pb-6" id="disclosure-1" x-show="open" style="display: none;">
                                For D&D players who desire more than just dice—those who seek finely crafted pieces of
                                art that not only enhance gameplay but also embody the arcane, mystical, and sometimes
                                darker essence of their characters and campaigns. Our dice go beyond function to weave
                                stories, creating an immersive gaming experience tailored to each player's personal
                                journey.
                            </div>
                        </div>
                        <div x-data="{ open: false }">
                            <h3>
                                <button type="button" x-description="Expand/collapse question button"
                                        class="group relative flex w-full items-center justify-between py-6 text-left"
                                        aria-controls="disclosure-1" @click="open = !open" aria-expanded="false"
                                        x-bind:aria-expanded="open.toString()">
                                    <span class="text-sm font-bold text-gray-900" x-state:on="Open"
                                          x-state:off="Closed"
                                          :class="{ 'font-bold': open, 'text-gray-900': !(open) }">Collectors and Enthusiasts</span>
                                    <span class="ml-6 flex items-center">
                        <svg class="h-6 w-6 text-gray-400 group-hover:text-gray-500 block" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'hidden': open, 'block': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        <svg class="h-6 w-6 hidden" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'block': open, 'hidden': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"></path>
                        </svg>
                      </span>
                                </button>
                            </h3>
                            <div class="prose prose-sm pb-6" id="disclosure-1" x-show="open" style="display: none;">
                                For collectors and enthusiasts who value artistry and rarity, Arcanis Diceworks offers
                                more than just dice—we provide collectible pieces that blend fantasy and horror themes
                                into one-of-a-kind creations. Our limited-edition sets, crafted with precision and care,
                                are not just tools for gameplay but artistic expressions that stand out in any
                                collection. Whether it's the intricate details, custom designs, or the exclusivity of
                                our limited runs, each set is a treasure waiting to be discovered.
                            </div>
                        </div>
                        <div x-data="{ open: false }">
                            <h3>
                                <button type="button" x-description="Expand/collapse question button"
                                        class="group relative flex w-full items-center justify-between py-6 text-left"
                                        aria-controls="disclosure-1" @click="open = !open" aria-expanded="true"
                                        x-bind:aria-expanded="open.toString()">
                                    <span class="text-sm font-bold" x-state:on="Open"
                                          x-state:off="Closed"
                                          :class="{ 'font-bold': open, 'text-gray-900': !(open) }">Horror and Occult Fans</span>
                                    <span class="ml-6 flex items-center">
                        <svg class="h-6 w-6 text-gray-400 group-hover:text-gray-500 hidden" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'hidden': open, 'block': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        <svg class="h-6 w-6 block" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'block': open, 'hidden': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"></path>
                        </svg>
                      </span>
                                </button>
                            </h3>
                            <div class="prose prose-sm pb-6" id="disclosure-1" x-show="open">
                                For those who are drawn to the eerie, mystical, and supernatural, Arcanis Diceworks
                                offers dice that delve into the darker realms of fantasy. Each set is meticulously
                                crafted to reflect themes of horror, the occult, and dark magic, with designs inspired
                                by gothic aesthetics, Lovecraftian lore, and supernatural entities. Our dice not only
                                enhance gameplay but serve as talismans of the unknown, perfect for those who want their
                                tabletop experience to evoke a sense of mystery and dread. Whether you're a fan of
                                horror movies or fascinated by the occult, our dice bring the darkness to your
                                fingertips.
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </section>

        <section class="max-w-7xl mx-auto bg-athens mb-32">
            <div class="flex flex-row gap-x-4 py-16 px-8">
                <div class="w-1/2">
                    <img class="w-full h-auto" src="{{ url('/images/stock/dice_set.png') }}" alt="and ">
                </div>
                <div class="w-1/2 flex flex-col justify-center gap-y-4">
                    <h2 class="font-bold text-4xl">What Sets Us Apart</h2>
                    <p>What distinguishes Arcanis Diceworks is our immersive approach to dice-making. We don’t just
                        create dice; we craft narrative artifacts that enrich your adventures.</p>
                    <p>Our focus on high craftsmanship, storytelling, and deep connections to fantasy and occult genres
                        ensures that each set is a unique piece of gaming history.</p>
                </div>
            </div>
        </section>

        @include('components.footer')
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
