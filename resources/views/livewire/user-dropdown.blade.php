<div>
    <div @if(Auth::check()) @click="isUserOpen = !isUserOpen" @else wire:click.prevent="goToLogin" @endif
    class="cursor-pointer user-select-none mr-2 relative top-[15px] bg-bastille w-auto px-3 h-[41px] flex justify-center align-middle items-center gap-x-2 text-white text-sm items-center align-middle rounded-full">
        <svg class="h-[19px] w-auto" width="19" height="19" viewBox="0 0 19 19" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_53_959)">
                <path
                    d="M9.36441 9.15235C10.6218 9.15235 11.7106 8.70139 12.6002 7.81164C13.4898 6.92203 13.9407 5.83354 13.9407 4.57603C13.9407 3.31896 13.4898 2.23032 12.6 1.34043C11.7103 0.450964 10.6216 0 9.36441 0C8.1069 0 7.01841 0.450964 6.1288 1.34057C5.2392 2.23018 4.78809 3.31881 4.78809 4.57603C4.78809 5.83354 5.2392 6.92218 6.12895 7.81178C7.0187 8.70124 8.10733 9.15235 9.36441 9.15235Z"
                    fill="white"/>
                <path
                    d="M17.3719 14.61C17.3463 14.2398 17.2944 13.836 17.218 13.4095C17.1408 12.9798 17.0415 12.5737 16.9227 12.2024C16.7999 11.8187 16.6329 11.4398 16.4265 11.0767C16.2122 10.6998 15.9606 10.3716 15.6782 10.1016C15.3829 9.81903 15.0214 9.59188 14.6034 9.42619C14.1867 9.26138 13.7251 9.17788 13.2312 9.17788C13.0372 9.17788 12.8497 9.25746 12.4874 9.49331C12.2645 9.6387 12.0037 9.80685 11.7126 9.99283C11.4637 10.1514 11.1265 10.3 10.7101 10.4345C10.3038 10.566 9.89121 10.6327 9.48402 10.6327C9.07684 10.6327 8.66443 10.566 8.25768 10.4345C7.84165 10.3001 7.50448 10.1516 7.25587 9.99298C6.96755 9.80874 6.70663 9.64059 6.48035 9.49316C6.11854 9.25732 5.93081 9.17773 5.73686 9.17773C5.24284 9.17773 4.7813 9.26138 4.36483 9.42634C3.94707 9.59173 3.5854 9.81888 3.28983 10.1017C3.00759 10.3719 2.7558 10.6999 2.54184 11.0767C2.33557 11.4398 2.16858 11.8186 2.04565 12.2026C1.92693 12.5738 1.82764 12.9798 1.75052 13.4095C1.67413 13.8354 1.62223 14.2394 1.59657 14.6105C1.57135 14.974 1.55859 15.3513 1.55859 15.7324C1.55859 16.7242 1.87388 17.5272 2.4956 18.1193C3.10964 18.7036 3.92213 19.0001 4.91017 19.0001H14.0587C15.0468 19.0001 15.859 18.7038 16.4732 18.1193C17.095 17.5276 17.4103 16.7245 17.4103 15.7323C17.4102 15.3495 17.3973 14.9718 17.3719 14.61Z"
                    fill="white"/>
            </g>
            <defs>
                <clipPath id="clip0_53_959">
                    <rect width="18.9999" height="19" fill="white"/>
                </clipPath>
            </defs>
        </svg>

        @if(Auth::check())
            {{ Auth::user()->name }}
        @endif

        <div x-show="isUserOpen"
             class="z-20 absolute inset-x-0 top-16 mt-px bg-white pb-6 shadow-lg sm:px-2 lg:left-auto lg:right-0 lg:top-full lg:-mr-1.5 lg:mt-3 lg:w-80 lg:rounded-lg lg:ring-1 lg:ring-black lg:ring-opacity-5"
             @click.away="isUserOpen = false">
            <h2 class="sr-only">User Dropdown</h2>

            <ul role="list" class="divide-y divide-gray-200 text-cinder">
                @if(Auth::check())
                    <li class="flex items-center py-4 px-2">
                        <a href="{{ route('profile.show') }}">User Profile</a>
                    </li>
                    <li class="flex items-center py-4 px-2">
                        <a href="{{ route('orders') }}">Orders</a>
                    </li>
                    <li class="flex items-center pt-4 px-2">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
