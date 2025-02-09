<template>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Create Company Journey -->
        <div
            class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-video bg-orange-50 flex items-center justify-center">
                <span class="text-6xl">[New Company]</span>
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Create a Company</h2>
                <p class="text-gray-600 mb-6">
                    Start fresh with your own company on our platform.
                    Build your business from the ground up with our comprehensive tools and support.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Set up your company profile and branding from scratch
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Full control over company settings and user roles
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Access to administrative tools and analytics
                    </li>
                </ul>
                <a href="/choose/company/create"
                    class="block w-full bg-orange-500 text-white text-center py-4 rounded-xl font-semibold hover:bg-orange-600 transition-colors duration-300">
                    Create New Company
                </a>
            </div>
        </div>

        <!-- Join Company Journey -->
        <div
            class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="aspect-video bg-orange-50 flex items-center justify-center">
                <span class="text-6xl">[Join Team]</span>
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Join Existing Company</h2>
                <p class="text-gray-600 mb-6">
                    Already have a company invite? Join your team and start contributing.
                    Connect with your colleagues and access your company's platform.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Quick onboarding with your company invite code
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Immediate access to your team's workspace
                    </li>
                    <li class="flex items-center text-gray-700">
                        <div class="w-6 h-6 mr-2 text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        Collaborate with your existing team members
                    </li>
                </ul>
                <a href="/choose/company/join"
                    class="block w-full bg-orange-500 text-white text-center py-4 rounded-xl font-semibold hover:bg-orange-600 transition-colors duration-300">
                    Join Company
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
