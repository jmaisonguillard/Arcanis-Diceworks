<div x-show="isCartOpen" @click.outside="isCartOpen = false" x-transition  class="z-20 absolute inset-x-0 top-16 right-20 mt-px bg-white pb-6 shadow-lg sm:px-2 lg:left-auto lg:right-52 lg:top-12 lg:-mr-1.5 lg:mt-3 lg:w-80 lg:rounded-lg lg:ring-1 lg:ring-black lg:ring-opacity-5">
    <h2 class="sr-only">Shopping Cart</h2>

    <form class="mx-auto max-w-2xl px-4">
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

        <button type="submit" class="w-full rounded-md border border-transparent bg-heliotrope px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
    </form>
</div>
