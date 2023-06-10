<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-wrap self-end ml-56 mb-14 mr-10">
        <div class="ml-16">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-red-200 shadow-md overflow-hidden sm:rounded-lg">
            <h3 class="text-center text-4xl mb-2">Inicio de Sesión</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">@lang('app.Recuerdame')</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{route("register")}}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-1 rounded">@lang('app.REGISTRATE')</a>
                    <x-primary-button class="ml-3">
                        @lang('app.Iniciar')
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
