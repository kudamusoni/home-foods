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

<body class="font-sans antialiased bg-gray-100 h-screen">
    {{-- @include('layouts.navigation') --}}

    {{-- @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset --}}
    <div class="min-h-screen">
        <main id="app" class="container mx-auto p-4 h-screen">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
