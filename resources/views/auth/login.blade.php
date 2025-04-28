<x-guest-layout>

    <!-- Mensaje de sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="bg-white p-10 rounded-4 shadow-2xl max-w-lg mx-auto mt-20 animate__animated animate__fadeIn">

            <!-- Logo (opcional) -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16">
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-6">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full rounded-3xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-6">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-3xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordarme -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-300"
                        name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">
                        Recordarme
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline font-semibold">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <!-- Botón de Login -->
            <div>
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-800 text-indigo-600 py-3 rounded-3xl text-lg font-bold tracking-wide hover:from-indigo-700 hover:to-indigo-900 transition-all duration-300">
                    INICIAR SESIÓN
                </button>
            </div>


            <!-- Botón de No te has registrado -->
            <div class="flex justify-between mt-4">
                <a href="{{ route('register') }}" class="w-1/2 bg-gradient-to-r from-green-600 to-green-800 text-black py-3 rounded-3xl text-lg font-bold tracking-wide hover:from-green-700 hover:to-green-900 transition-all duration-300 mr-2">
                    ¿No te has registrado?
                </a>
            </div>

            <!-- Línea divisoria -->
            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-4 text-gray-400">o</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>


        </div>
    </form>

    <!-- Redirección en caso de éxito -->
    @push('scripts')
        <script>
            @if(session('status') == 'login-successful')
                window.location.href = "{{ route('equipos.index') }}";
            @endif
        </script>
    @endpush

</x-guest-layout>
