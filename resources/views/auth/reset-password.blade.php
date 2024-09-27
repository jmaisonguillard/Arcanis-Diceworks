<x-layouts.auth>
    <div class="max-w-7xl shadow-lg border border-cinder mx-auto w-full">
        <div class="grid grid-cols-2 min-h-[800px]">
            <div class="bg-cinder">
                <div class="flex flex-col h-full">
                    <div class="grow py-8 px-16 flex flex-col">
                        <div class="flex justify-center">
                            <a href="{{ route('welcome') }}">
                                <x-application-mark class="block h-9 w-auto"/>
                            </a>
                        </div>
                        <h1 class="font-semibold text-5xl mt-24">{{ __('Reset Password') }}</h1>
                        <p class="font-normal leading-6 py-8">{{ __('The arcane runes seem to have slipped your mind. Let us help you recover your path to the Diceworks.') }}</p>

                        <x-validation-errors class="mb-4" />


                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="block">
                                <x-input id="email" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="email" name="email" :value="old('email', $request->email)" placeholder="{{ __('Email') }}" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-input id="password" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-input id="password_confirmation" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
                            </div>

                            <div class="flex items-center mt-4">
                                <x-adv-button :color="'white'" class="ms-4">
                                    {{ __('Reset Password') }}
                                </x-adv-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-dice bg-cover"></div>
        </div>
    </div>
</x-layouts.auth>
