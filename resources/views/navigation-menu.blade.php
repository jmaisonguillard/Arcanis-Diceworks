<nav x-data="{ open: false }" class="bg-transparent">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="hidden  sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link class="mr-8" href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link class="mr-8" href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">
                    {{ __('About Us') }}
                </x-nav-link>
                <x-nav-link class="mr-8" href="{{ route('products') }}" :active="request()->routeIs('products')">
                    {{ __('Products') }}
                </x-nav-link>
                <a href="#" class="mr-2 relative top-[15px] bg-bastille w-[41px] h-[41px] flex justify-center items-center align-middle rounded-full">
                    <svg class="h-[19px] w-auto" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_53_959)">
                            <path d="M9.36441 9.15235C10.6218 9.15235 11.7106 8.70139 12.6002 7.81164C13.4898 6.92203 13.9407 5.83354 13.9407 4.57603C13.9407 3.31896 13.4898 2.23032 12.6 1.34043C11.7103 0.450964 10.6216 0 9.36441 0C8.1069 0 7.01841 0.450964 6.1288 1.34057C5.2392 2.23018 4.78809 3.31881 4.78809 4.57603C4.78809 5.83354 5.2392 6.92218 6.12895 7.81178C7.0187 8.70124 8.10733 9.15235 9.36441 9.15235Z" fill="white"/>
                            <path d="M17.3719 14.61C17.3463 14.2398 17.2944 13.836 17.218 13.4095C17.1408 12.9798 17.0415 12.5737 16.9227 12.2024C16.7999 11.8187 16.6329 11.4398 16.4265 11.0767C16.2122 10.6998 15.9606 10.3716 15.6782 10.1016C15.3829 9.81903 15.0214 9.59188 14.6034 9.42619C14.1867 9.26138 13.7251 9.17788 13.2312 9.17788C13.0372 9.17788 12.8497 9.25746 12.4874 9.49331C12.2645 9.6387 12.0037 9.80685 11.7126 9.99283C11.4637 10.1514 11.1265 10.3 10.7101 10.4345C10.3038 10.566 9.89121 10.6327 9.48402 10.6327C9.07684 10.6327 8.66443 10.566 8.25768 10.4345C7.84165 10.3001 7.50448 10.1516 7.25587 9.99298C6.96755 9.80874 6.70663 9.64059 6.48035 9.49316C6.11854 9.25732 5.93081 9.17773 5.73686 9.17773C5.24284 9.17773 4.7813 9.26138 4.36483 9.42634C3.94707 9.59173 3.5854 9.81888 3.28983 10.1017C3.00759 10.3719 2.7558 10.6999 2.54184 11.0767C2.33557 11.4398 2.16858 11.8186 2.04565 12.2026C1.92693 12.5738 1.82764 12.9798 1.75052 13.4095C1.67413 13.8354 1.62223 14.2394 1.59657 14.6105C1.57135 14.974 1.55859 15.3513 1.55859 15.7324C1.55859 16.7242 1.87388 17.5272 2.4956 18.1193C3.10964 18.7036 3.92213 19.0001 4.91017 19.0001H14.0587C15.0468 19.0001 15.859 18.7038 16.4732 18.1193C17.095 17.5276 17.4103 16.7245 17.4103 15.7323C17.4102 15.3495 17.3973 14.9718 17.3719 14.61Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_53_959">
                                <rect width="18.9999" height="19" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" class="relative top-[15px] bg-bastille w-[41px] h-[41px] flex justify-center items-center align-middle rounded-full">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_53_948)">
                            <path d="M14.3904 14.1267C13.1701 14.1255 12.1799 15.1138 12.1787 16.3341C12.1775 17.5543 13.1658 18.5445 14.3861 18.5457C15.6064 18.5469 16.5965 17.5586 16.5977 16.3384C16.5977 16.3377 16.5977 16.337 16.5977 16.3362C16.5966 15.1173 15.6093 14.1291 14.3904 14.1267Z" fill="white"/>
                            <path d="M18.3095 3.54645C18.2566 3.53621 18.2029 3.53101 18.1491 3.53093H4.69602L4.48295 2.1055C4.3502 1.15884 3.54046 0.454515 2.58453 0.454224H0.85227C0.381566 0.454224 0 0.835789 0 1.30649C0 1.7772 0.381566 2.15876 0.85227 2.15876H2.58665C2.69501 2.15797 2.78673 2.23866 2.79972 2.34628L4.1122 11.342C4.29214 12.485 5.27538 13.3283 6.43252 13.332H15.2982C16.4123 13.3335 17.3734 12.5505 17.5972 11.4592L18.9843 4.54512C19.0737 4.08299 18.7716 3.63588 18.3095 3.54645Z" fill="white"/>
                            <path d="M8.97797 16.2417C8.92607 15.0572 7.94854 14.1248 6.7629 14.1289C5.54363 14.1782 4.59514 15.2066 4.64441 16.4258C4.69169 17.5958 5.64338 18.5256 6.81404 18.5458H6.86731C8.08641 18.4924 9.03136 17.4608 8.97797 16.2417Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_53_948">
                                <rect width="19" height="19" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                {{ __('Welcome') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if(Auth::user())
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
