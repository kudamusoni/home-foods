<template>


    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Images -->
            <div class="space-y-4">
                <div class="aspect-square bg-white rounded-lg overflow-hidden max-w-md mx-auto">
                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                        [Main Product Image 400x400]
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2 max-w-md mx-auto">
                    <div class="aspect-square bg-white rounded-md overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            [Thumb 1]
                        </div>
                    </div>
                    <div class="aspect-square bg-white rounded-md overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            [Thumb 2]
                        </div>
                    </div>
                    <div class="aspect-square bg-white rounded-md overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            [Thumb 3]
                        </div>
                    </div>
                    <div class="aspect-square bg-white rounded-md overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            [Thumb 4]
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Organic Mixed Berries</h1>
                    <p class="mt-2 text-gray-600">Fresh, locally sourced mixed berries. Perfect for smoothies,
                        baking, or enjoying as is.</p>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-bold text-gray-900">$12.99</span>
                    <span class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded">In Stock</span>
                </div>

                <!-- Size Selection -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Package Size</h3>
                    <div class="mt-2 grid grid-cols-3 gap-2">
                        <button class="py-2 text-sm font-medium rounded-md bg-gray-900 text-white">250g</button>
                        <button
                            class="py-2 text-sm font-medium rounded-md bg-gray-50 text-gray-900 hover:bg-gray-100">500g</button>
                        <button
                            class="py-2 text-sm font-medium rounded-md bg-gray-50 text-gray-900 hover:bg-gray-100">1kg</button>
                    </div>
                </div>

                <!-- Quantity Selector -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Quantity</h3>
                    <div class="mt-2 flex items-center space-x-4">
                        <div class="flex items-center border border-gray-300 rounded-md">
                            <button class="p-2 hover:bg-gray-100">[-]</button>
                            <span class="px-4 py-2 text-gray-900">1</span>
                            <button class="p-2 hover:bg-gray-100">[+]</button>
                        </div>
                        <span class="text-gray-600">Total: $12.99</span>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <button
                    class="w-full bg-gray-900 text-white py-3 px-4 rounded-md hover:bg-gray-800 flex items-center justify-center space-x-2">
                    <span>[Cart Icon]</span>
                    <span>Add to Cart</span>
                </button>

                <!-- Features -->
                <div class="border-t border-gray-200 pt-6">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-400">[Clock Icon]</span>
                            <span class="text-sm text-gray-600">Same-day delivery available</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-400">[Leaf Icon]</span>
                            <span class="text-sm text-gray-600">Organic certified</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-400">[Tag Icon]</span>
                            <span class="text-sm text-gray-600">Bulk discounts available</span>
                        </div>
                    </div>
                </div>

                <!-- Nutritional Information -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-sm font-medium text-gray-900">Nutritional Information</h3>
                    <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Serving Size</span>
                            <span class="text-gray-900">100g</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Calories</span>
                            <span class="text-gray-900">50</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sugar</span>
                            <span class="text-gray-900">10g</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Fiber</span>
                            <span class="text-gray-900">4g</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description -->
        <div class="mt-16">
            <div class="border-t border-gray-200 pt-8">
                <h2 class="text-xl font-bold text-gray-900">Product Information</h2>
                <div class="mt-4 prose prose-sm text-gray-600">
                    <p>Our premium mixed berries are carefully selected and flash-frozen at peak ripeness to
                        preserve their natural sweetness and nutritional value. This mix includes strawberries,
                        blueberries, raspberries, and blackberries.</p>
                    <ul class="mt-4 space-y-2">
                        <li>100% organic certified</li>
                        <li>No added sugars or preservatives</li>
                        <li>Rich in antioxidants</li>
                        <li>Perfect for smoothies and baking</li>
                        <li>Store in freezer at -18°C or below</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</template>
