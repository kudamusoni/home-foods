<template>
    <div class="layout-content-container flex flex-col flex-1">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-gray-900 text-[32px] font-bold leading-tight">Create Product</h1>
            <p class="text-gray-500 text-sm">Add a new product to your inventory</p>
        </div>

        <!-- Form -->
        <form @submit.prevent="createProduct">
            <!-- Basic Info Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Basic Information</h2>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Product Name</label>
                        <input type="text" v-model="product.name" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Description</label>
                        <textarea rows="4" v-model="product.description" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"></textarea>
                    </div>
                </div>
            </div>

            <!-- Pricing Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Pricing</h2>

                <div class="grid gap-6 md:grid-cols-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Regular Price</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">£</span>
                            <input type="number" step="0.01" v-model="product.price" required
                                class="w-full rounded-xl border border-gray-500 pl-7 pr-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Sale Price</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">£</span>
                            <input type="number" step="0.01" v-model="product.sale_price"
                                class="w-full rounded-xl border border-gray-500 pl-7 pr-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Cost per item</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">£</span>
                            <input type="number" step="0.01" v-model="product.cost_per_item" required
                                class="w-full rounded-xl border border-gray-500 pl-7 pr-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Inventory</h2>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Quantity</label>
                        <input type="number" v-model="product.quantity" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Category</label>
                        <select v-model="product.category" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                            <option value="" selected disabled>Select a category</option>
                            <option v-for="category in categories" :key="category.id" :value="category.name">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4">
                <button type="button"
                    class="rounded-xl px-6 py-2 text-sm font-medium text-gray-900 border border-gray-500 hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="rounded-xl px-6 py-2 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['categories'],
    data() {
        return {
            product: {
                name: null,
                description: null,
                price: null,
                sale_price: null,
                cost_per_item: null,
                quantity: null,
                category: null,
            },
            errorMsg: null
        }
    },
    computed: {
    },
    methods: {
        validatePrice(price) {
            // Convert to cents/smallest currency unit for backend
            const priceInCents = Math.round(parseFloat(price) * 100);
            return priceInCents;
        },
        createProduct() {
            this.errorMsg = null;

            if (!this.validatePrice(this.product.price) || !this.validatePrice(this.product.sale_price) || !this.validatePrice(this.product.cost_per_item)) {
                this.setErrorMessage('Please enter a valid price (e.g., 12.99)');
                return;
            }

            const body = {
                name: this.product.name,
                description: this.product.description,
                category: this.product.category,
                price: this.validatePrice(this.product.price),
                sale_price: this.validatePrice(this.product.sale_price),
                cost_per_item: this.validatePrice(this.product.cost_per_item),
                quantity: this.product.quantity
            };

            axios.post('/product/create', body)
                .then(response => {
                    console.log(response.data);
                    window.location.href = "/home";
                })
                .catch(error => {
                    console.log(error.response.data.message);
                    this.setErrorMessage(error.response.data.message);
                });
        },
        setErrorMessage(msg) {
            this.passwordFailure = true;
            this.errorMsg = msg;
            return true;
        },
    },
    mounted() {
        console.log(this.categories)
    },
}
</script>
