<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <img src="/kilang.png" alt="kilang" class="absolute inset-0 w-full h-full object-cover opacity-30 dark:opacity-40" />
            <div class="relative z-10">
                <a href="/" wire:navigate class="flex items-center gap-3">
                    <img src="/Pertamina.png" alt="Pertamina" class="w-16 h-16" />
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-4 bg-white/90 dark:bg-gray-800/90 backdrop-blur shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
