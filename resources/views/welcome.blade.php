<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Foods</title>


        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">

                    <div class="min-h-screen bg-gray-50">

    <!-- Hero Section -->
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Your Local Food Marketplace</h1>
            <p class="text-xl text-gray-600 mb-8">Connect with local vendors and discover authentic products in your community</p>
            <div class="flex justify-center gap-4">
                <a href="/register" class="rounded-xl px-6 py-3 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600">
                    Get Started
                </a>
                <a href="/login" class="rounded-xl px-6 py-3 text-sm font-medium text-gray-900 border border-gray-500 hover:bg-gray-50">
                    Login
                </a>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- For Buyers -->
            <div class="rounded-xl border border-gray-500 p-6 bg-white">
                <div class="h-12 w-12 text-orange-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-4">Shop Local</h2>
                <p class="text-gray-600 mb-4">Discover unique products from verified local sellers in your community</p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Fresh, local products
                    </li>
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Secure payments
                    </li>
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Verified sellers
                    </li>
                </ul>
            </div>

            <!-- For Sellers -->
            <div class="rounded-xl border border-gray-500 p-6 bg-white">
                <div class="h-12 w-12 text-orange-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-4">Grow Your Business</h2>
                <p class="text-gray-600 mb-4">Start selling to your local community with our easy-to-use platform</p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Simple store setup
                    </li>
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Order management
                    </li>
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Analytics & insights
                    </li>
                </ul>
            </div>

            <!-- Community -->
            <div class="rounded-xl border border-gray-500 p-6 bg-white">
                <div class="h-12 w-12 text-orange-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-4">Join the Community</h2>
                <p class="text-gray-600 mb-4">Be part of a growing network of local businesses and customers</p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Customer reviews
                    </li>
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Support local
                    </li>
                    <li class="flex items-center text-gray-700">
                        <span class="mr-2">✓</span>
                        Build connections
                    </li>
                </ul>
            </div>
        </div>

        <!-- How It Works -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-gray-600">Get started in three simple steps</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="rounded-xl border border-gray-500 p-6 bg-white text-center">
                    <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 text-orange-500 text-xl font-bold mb-4">1</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Create Account</h3>
                    <p class="text-gray-600">Sign up as a buyer or seller in minutes</p>
                </div>

                <div class="rounded-xl border border-gray-500 p-6 bg-white text-center">
                    <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 text-orange-500 text-xl font-bold mb-4">2</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Connect</h3>
                    <p class="text-gray-600">Find local sellers or set up your store</p>
                </div>

                <div class="rounded-xl border border-gray-500 p-6 bg-white text-center">
                    <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 text-orange-500 text-xl font-bold mb-4">3</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Start Trading</h3>
                    <p class="text-gray-600">Begin buying or selling in your community</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="rounded-xl border border-gray-500 bg-white p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Ready to Get Started?</h2>
            <p class="text-gray-600 mb-6">Join our community of local buyers and sellers today</p>
            <div class="flex justify-center gap-4">
                <a href="/register" class="rounded-xl px-6 py-3 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600">
                    Create Account
                </a>
                <a href="/contact" class="rounded-xl px-6 py-3 text-sm font-medium text-gray-900 border border-gray-500 hover:bg-gray-50">
                    Contact Sales
                </a>
            </div>
        </div>
    </div>
</div>
