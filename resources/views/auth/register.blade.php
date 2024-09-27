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
                        <h1 class="font-semibold text-5xl mt-24">{{ __('Sign Up') }}</h1>
                        <p class="font-normal leading-6 py-8">{{ __('Every great quest begins with a step. Sign up and start your journey with the finest dice by your side.') }}</p>

                        @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                        @endsession

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <x-input id="name" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <x-input id="email" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="email" name="email" :value="old('email')" placeholder="Email" required autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-input id="password" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-input id="password_confirmation" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                            </div>

                            <div class="flex items-center mt-4">
                                <x-adv-button :color="'white'" class="ms-4">
                                    {{ __('Sign Up') }}
                                </x-adv-button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-heliotrope grow-0 py-8 text-center text-sm ">
                        Have an account?
                        <a class="font-bold" href="{{ route('login') }}">Sign In</a>
                    </div>
                </div>
            </div>
            <div class="bg-dice bg-cover"></div>
        </div>
    </div>
</x-layouts.auth>
