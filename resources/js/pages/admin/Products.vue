<template>
    <div class="layout-content-container flex flex-col flex-1">
        <div class="flex flex-wrap pb-4">
            <p class="text-gray-900 tracking-light text-[32px] font-bold leading-tight min-w-72">Products</p>
        </div>
        <div class="flex flex-wrap pb-4">
            <a href="/product/create">
                <button class="h-10 min-w-[84px] rounded-xl bg-orange-500 px-4 text-sm font-bold">
                    <span class="truncate">Create a product</span>
                </button>
            </a>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <!-- Search Bar -->
            <div class="flex-1 min-w-[240px]">
                <div class="relative">
                    <input type="text" placeholder="Search products..."
                        class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500" />
                </div>
            </div>

            <!-- Filters -->
            <div class="flex gap-2">
                <!-- Category Filter -->
                <select
                    class="w-1/4 h-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    <option value="">Category</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="books">Books</option>
                </select>

                <!-- Price Filter -->
                <select
                    class="w-1/4 h-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    <option value="">Price Range</option>
                    <option value="0-50">$0 - $50</option>
                    <option value="51-100">$51 - $100</option>
                    <option value="101+">$101+</option>
                </select>

                <!-- Stock Filter -->
                <select
                    class="w-1/4 h-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    <option value="">Stock Status</option>
                    <option value="in-stock">In Stock</option>
                    <option value="low-stock">Low Stock</option>
                    <option value="out-of-stock">Out of Stock</option>
                </select>

                <!-- Clear Filters Button -->
                <button
                    class="rounded-xl border w-1/4 border-gray-500 px-4 py-2 text-sm text-gray-900 hover:bg-gray-50">
                    Clear Filters
                </button>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-gray-500">
            <table class="w-full">
                <!-- Table Header -->
                <thead>
                    <tr class="border-b border-gray-500 bg-gray-100">
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Product</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">SKU</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Stock</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Price</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Sales</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-500">
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Product Name</div>
                            <div class="text-sm text-gray-500">Category</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">SKU-123</td>
                        <td class="px-6 py-4 text-sm text-gray-900">125</td>
                        <td class="px-6 py-4 text-sm text-gray-900">$99.99</td>
                        <td class="px-6 py-4 text-sm text-gray-900">254</td>
                    </tr>

                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Another Product</div>
                            <div class="text-sm text-gray-500">Category</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">SKU-456</td>
                        <td class="px-6 py-4 text-sm text-gray-900">89</td>
                        <td class="px-6 py-4 text-sm text-gray-900">$149.99</td>
                        <td class="px-6 py-4 text-sm text-gray-900">187</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style></style>
