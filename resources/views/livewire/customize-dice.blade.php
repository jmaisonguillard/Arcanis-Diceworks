<div>
    <div class="mx-auto max-w-7xl my-32">
        <div class="flex flex-row gap-x-8">
            <div class="w-1/4">
                <div class="dice rounded-lg border border-gray-100 text-center p-8">
                    <i class="fa-solid fa-dice-d20" style="background: linear-gradient(45deg, #6A3055, #967CA6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 200px;"></i>
                </div>
            </div>
            <div class="w-3/4">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-medium text-gray-900">{{ __('Customize your Dice') }}</h1>
                    <h1 class="text-xl font-medium text-gray-900">${{ number_format($cost, 2) }}</h1>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900 mt-8">{{ __('Style') }}</div>
                    <div class="mt-2 grid grid-cols-3 gap-3 sm:grid-cols-3">
                        @foreach($this->diceStyles as $style)
                            <label aria-label="{{ $style['name'] }}" aria-description="{{ $style['description'] }}"
                                   class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                                <input type="radio" wire:model.live="selectedStyle" name="dice-style"
                                       value="{{ $style['slug'] }}" class="sr-only">
                                <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span
                                                class="block text-sm font-medium text-gray-900">{{ $style['name'] }}
                                            </span>
                                            <span
                                                class="mt-1 flex items-center text-sm text-gray-500">{{ $style['description'] }}
                                            </span>
                                            <span
                                                class="text-xs font-semibold text-gray-500">Max Colors - {{ $style['max_colors'] }}</span>
                                        </span>
                                    </span>
                                <svg
                                    class="h-5 w-5 text-indigo-600 fill-heliotrope {{ $this->selectedStyle !== $style['slug'] ? 'invisible' : 'visible' }}"
                                    viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <!--
                                  Active: "border", Not Active: "border-2"
                                  Checked: "border-indigo-600", Not Checked: "border-transparent"
                                -->
                                <span
                                    class="pointer-events-none absolute -inset-px rounded-lg border-2 {{ $this->selectedStyle === $style['slug'] ? 'border border-heliotrope' : 'border-2 border-transparent' }}"
                                    aria-hidden="true"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="divide-y divide-gray-200 gap-y-8 mt-8">
                    <div>
                        @if($this->selectedStyle)
                            <div class="text-sm font-medium text-gray-900">{{ __('Select Colors') }}</div>
                            @foreach($this->selectedStyleAllowedColors['allowed_colors'] as $type => $color_types)
                                @foreach($color_types as $color_type => $name)
                                    <div>
                                        <div class="font-bold mt-4">{{ $name }}</div>
                                    </div>
                                    <div class="mt-6 flex items-center gap-3 flex flex-row flex-wrap">
                                        @foreach($this->colorsStore->dice->$type->$color_type as $color)
                                            @if(!is_array($color->hex))
                                                <div
                                                    class="w-10 h-10 rounded-full shadow-md border border-gray-200 cursor-pointer user-select-none {{ $this->isColorSelected($type . '.' . $color_type, $color->id) ? 'ring ring-offset-1' : '' }}"
                                                    wire:key="{{ $type . '-' . $color_type . '-' . $color->id }}"
                                                    wire:click="toggleColors('{{ $type . '.' . $color_type }}', '{{ $color->id }}')"
                                                    style="background-color: {{ $color->hex }};  --tw-ring-color: {{$color->hex}};"
                                                    title="{{ $color->name }}"></div>
                                            @else
                                                <div
                                                    class="w-10 h-10 rounded-full shadow-md border border-gray-200 cursor-pointer user-select-none {{ $this->isColorSelected($type . '.' . $color_type, $color->id) ? 'ring ring-offset-1' : '' }}"
                                                    wire:key="{{ $type . '-' . $color_type . '-' . $color->id }}"
                                                    wire:click="toggleColors('{{ $type . '.' . $color_type }}', '{{ $color->id }}')"
                                                    style="background: linear-gradient(45deg, {{ $color->hex[0] }}, {{ $color->hex[1] }}); --tw-ring-color: {{ $color->hex[0] }}; }}"
                                                    title="{{ $color->name }}"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
