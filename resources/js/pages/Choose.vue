<template>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Customer Journey -->
        <div
            class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-video bg-orange-50 flex items-center justify-center">
                <span class="text-6xl">[Customer Icon]</span>
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">I'm a customer</h2>
                <p class="text-gray-600 mb-6">
                    Your neighborhood marketplace: connecting you with local sellers
                    Support independent businesses while discovering one-of-a-kind products made with care
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Shop with confidence from verified local sellers in your community
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Connect with sellers who take pride in their craft
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Easy ordering and secure payments make shopping simple
                    </li>
                </ul>
                <a href="/choose/user"
                    class="block w-full bg-orange-500 text-white text-center py-4 rounded-xl font-semibold hover:bg-orange-600 transition-colors duration-300">
                    Sign-up as User
                </a>
            </div>
        </div>

        <!-- Company Journey -->
        <div
            class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-video bg-orange-50 flex items-center justify-center">
                <span class="text-6xl">[Company Icon]</span>
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">I'm apart of a company</h2>
                <p class="text-gray-600 mb-6">
                    Grow your business by selling to your local community.
                    Join a marketplace that connects you directly with customers who value independent sellers
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Simple tools to manage your inventory, orders, and payments
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Reach customers looking for unique products in your area
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Focus on what you do best - we handle the tech
                    </li>
                </ul>
                <a href="/choose/company"
                    class="block w-full bg-orange-500 text-white text-center py-4 rounded-xl font-semibold hover:bg-orange-600 transition-colors duration-300">
                    Sign-up as Company
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Choose',
    mounted() {
        console.log('hit');
    }
}
</script>
