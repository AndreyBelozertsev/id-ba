<x-guest-layout>
    <!-- Session Status -->
    <p class="block text-btn-sec-21 font-nunito-700 text-lg md:text-xl mb-2">Для того чтобы предложить свою идею необходимо войти или <a class="text-header" href="{{ route('register') }}">зарегистрироваться</a></p>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form class="w-full" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Пароль'" />

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
                <span class="ms-2 text-sm text-gray-600">Запомнить?</span>
            </label>
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
            <x-primary-button class="mb-4">
                Войти
            </x-primary-button>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-2" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-2" href="{{ route('register') }}">
                    Зарегистрироваться
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
