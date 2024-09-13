<div>
    <a @click="isCartOpen = !isCartOpen" href="#" class="relative top-[15px] bg-bastille w-[41px] h-[41px] flex justify-center items-center align-middle rounded-full">
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
        <span class="absolute right-0 bottom-0 bg-heliotrope rounded-full font-bold w-4 h-4 flex justify-center align-middle text-xs text-white">
            {{ number_format($this->getCartCount()) }}
        </span>
    </a>

    <div x-show="isCartOpen" @click.outside="isCartOpen = false" x-transition  class="z-20 absolute inset-x-0 top-16 right-20 mt-px bg-white pb-6 shadow-lg sm:px-2 lg:left-auto lg:right-52 lg:top-12 lg:-mr-1.5 lg:mt-3 lg:w-80 lg:rounded-lg lg:ring-1 lg:ring-black lg:ring-opacity-5">
        <h2 class="sr-only">Shopping Cart</h2>

        <form class="mx-auto max-w-2xl px-4">

            @if($products)
                <div class="px-2 py-4 text-right text-minsk">
                    <a wire:click.prevent="clearCart" href="#">Clear Cart</a>
                </div>
            @endif

            <ul role="list" class="divide-y divide-gray-200">
                @foreach($products as $product)
                    <li class="flex items-center py-6">
                        <img src="{{ $product['preview'] }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-16 w-16 flex-none rounded-md border border-gray-200">
                        <div class="ml-4 flex-auto">
                            <h3 class="font-medium text-gray-900">
                                <a href="#">{{ $product['product']['name'] }}</a>
                            </h3>
                            <p class="text-gray-500">Qty: {{ $product['quantity'] }}</p>
                        </div>
                    </li>
                @endforeach

                @if(!$products)
                    <li class="flex items-center py-6">
                        Your cart is currently empty.
                    </li>
                @endif
            </ul>

            <button wire:click.prevent="goToCheckout" type="submit" class="w-full rounded-md border border-transparent bg-heliotrope px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
        </form>
    </div>
</div>
