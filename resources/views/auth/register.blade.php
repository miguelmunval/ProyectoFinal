<x-guest-layout>
    <div class="flex flex-wrap self-end ml-56 mb-14 mr-10">
        <div class="ml-16">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-red-200 shadow-md overflow-hidden sm:rounded-lg">
            <h3 class="text-center text-4xl mb-2">Registro</h3>

            <form method="POST" action="{{ route('user.guardar') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="nomUsu" :value="__('Nombre de Usuario')" />
                    <input id="nomUsu" class="block mt-1 w-full" type="text" name="nomUsu" required autofocus autocomplete="nomUsu" />
                    <x-input-error :messages="$errors->get('nomUsu')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <input id="nombre" class="block mt-1 w-full" type="text" name="nombre"  required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="apellido" :value="__('Apellido')" />
                    <input id="apellido" class="block mt-1 w-full" type="text" name="apellido" required autofocus autocomplete="apellido" />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                </div class="mt-4">

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        @lang('app.Registrado')
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
