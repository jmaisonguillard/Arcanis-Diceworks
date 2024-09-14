<x-layouts.auth>
    <div class="max-w-7xl shadow-lg border border-cinder mx-auto w-full">
        <div class="grid grid-cols-2 min-h-[800px]">
            <div class="bg-cinder">
                <div class="flex flex-col h-full">
                    <div class="grow py-8 px-16 flex flex-col">
                        <div class="flex justify-center">
                            <x-application-mark class="block h-9 w-auto"/>
                        </div>
                        <h1 class="font-semibold text-5xl mt-24">Forgot Password</h1>
                        <p class="font-normal leading-6 py-8">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

                        @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                        @endsession

                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="block">
                                <x-input id="email" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <x-adv-button :color="'white'" class="mt-4">
                                    {{ __('Email Password Reset Link') }}
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
