@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="bg-gray-300 text-gray-500 px-4 py-2 rounded">Previous</span>
        @else
            <button wire:click="previousPage" class="bg-heliotrope text-white px-4 py-2 rounded">Previous</button>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex space-x-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="bg-heliotrope text-white px-4 py-2 rounded">{{ $page }}</button>
                        @else
                            <button wire:click="gotoPage({{ $page }})" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">{{ $page }}</button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" class="bg-heliotrope text-white px-4 py-2 rounded">Next</button>
        @else
            <span class="bg-gray-300 text-gray-500 px-4 py-2 rounded">Next</span>
        @endif
    </nav>
@endif
