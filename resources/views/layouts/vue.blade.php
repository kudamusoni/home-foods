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
            <a href="{{ route('home') }}">
                <h2 class="text-lg font-bold text-gray-900">Home Foods</h2>
            </a>
        </div>
        <div class="flex flex-1 justify-end gap-8">
            @hasanyrole('company_user|company_admin')
                <!-- Navigation links -->
                <nav class="flex items-center gap-9">
                    <a class="text-sm font-medium text-stone-900" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="text-sm font-medium text-stone-900" href="#">Orders</a>
                    <a class="text-sm font-medium text-stone-900" href="{{ route('products') }}">Products</a>
                    <a class="text-sm font-medium text-stone-900" href="{{ route('users') }}">Users</a>
                </nav>

                <!-- Buttons -->
                <div class="flex gap-2">
                    <a href="{{ route('product-create') }}">
                        <button class="h-10 min-w-[84px] rounded-xl bg-orange-500 px-4 text-sm font-bold">
                            <span class="truncate">Create</span>
                        </button>
                    </a>

                    <button class="h-10 rounded-xl bg-stone-100 px-2.5 text-sm font-bold">
                        <!-- Bell icon can go here -->
                    </button>
                </div>

                <!-- Avatar -->
                <div class="h-10 w-10 rounded-full bg-cover bg-center"></div>
            @else
                {{-- <div class="flex gap-2">
                    <button class="h-10 min-w-[84px] rounded-xl bg-orange-500 px-4 text-sm font-bold">
                        <span class="truncate">Sign In</span>
                    </button>
                </div> --}}
            @endhasanyrole
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
