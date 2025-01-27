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

    <!-- Scripts for Vue -->
    @vite(['resources/css/app.css', 'resources/js/vue.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    {{-- @include('layouts.navigation') --}}

    {{-- @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset --}}
    <header class="flex items-center justify-between border-b border-gray-200 px-10 py-3">
        <div class="flex items-center gap-4">
            <div class="w-4 h-4">
                <!-- SVG Placeholder -->
                <svg viewBox="0 0 48 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <!-- SVG content removed -->
                </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-900">Camping Land</h2>
        </div>
        <div class="flex gap-2">
            <button class="min-w-[84px] h-10 px-4 bg-gray-100 text-gray-900 rounded-xl text-sm font-bold">
                <span class="truncate">Sign in</span>
            </button>
            <button
                class="h-10 bg-gray-100 text-gray-900 rounded-xl text-sm font-bold flex items-center justify-center gap-2 px-2.5">
                <!-- SVG Placeholder -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor"
                    viewBox="0 0 256 256">
                    <!-- SVG content removed -->
                </svg>
            </button>
        </div>
    </header>

    {{-- <div class="min-h-screen">
        <main id="app" class="container mx-auto p-4 h-screen"> --}}
    <main class="px-10 py-5 flex-1">
        <div id="app" class="container mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
