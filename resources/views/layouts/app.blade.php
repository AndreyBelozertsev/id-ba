<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/scss/main.scss' ,'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <header class="pt-3 lg:pt-5 pb-8">
            @include('layouts.navigation') 
        </header>
            <!-- Page Content -->
        <main class="mt-0 lg:mt-4 mb-20">
            @include('layouts.flash_message')
            {{ $slot }}
        </main>
        <footer class="pt-10 pb-5" style="background-image:url({{ asset('images/footer.jpg') }})">
            <div class="container text-white">
                <a class="logo relative w-[160px] block" href="{{ route('home') }}">
                    <div>
                        <x-application-logo-white />
                    </div>
                    <span class="absolute text-lg">Республики Крым</span>
                </a>
                <div class="grid grid-cols-12 pb-8 pt-16 sm:py-16">
                    <div class="col-span-12 sm:col-span-10 2xl:col-span-6 mb-5">
                        <h1 class="text-2xl lg:text-5xl font-nunito-700 mb-5">
                            Все начинается с идеи!
                        </h1>
                        <p class="text-base lg:text-xl">
                            Опишите Вашу идею максимально подробно и получите возможность ее реализовать!
                        </p>
                    </div>
                </div>
                <div>
                    <ul>
                        <li><a href="{{ route('about.index') }}">О проекте</a></li>
                        <li><a href="{{ route('regulations.index') }}">Положение проекта</a></li>
                        <li><a href="{{ route('personal.index') }}">Политика обработки персональных данных</a></li>
                        <li><a href="{{ route('privacy.index') }}">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <div class="text-center">
                    {{ date('Y') }} © Банк Идей Республики Крым
                </div>
            </div>
        </footer>
    </body>
</html>