<template>
    <div class="layout-content-container flex flex-col flex-1">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-gray-900 text-[32px] font-bold leading-tight">Create Company</h1>
            <p class="text-gray-500 text-sm">Register your company to start selling</p>
        </div>

        <!-- Form -->
        <form @submit.prevent="createCompany">
            <!-- Company Info Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Company Information</h2>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Company Name</label>
                        <input type="text" v-model="company.name" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter company name">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Country</label>
                        <select v-model="company.address.country" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                            <option value="" selected disabled>Select country</option>
                            <option v-for="country in countries" :key="country.iso_code" :value="country.iso_code">
                                {{ country.name }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Phone Number</label>
                        <input type="text" v-model="company.phone_number" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter phone number">
                    </div>
                </div>
            </div>

            <!-- Address Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Company Address</h2>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Address Line 1</label>
                        <input type="text" v-model="company.address.line" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter street address">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Address Line 2 (Optional)</label>
                        <input type="text" v-model="company.address.line2"
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Apartment, suite, etc. (Optional)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">City</label>
                        <input type="text" v-model="company.address.city" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter city">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">County/State</label>
                        <input type="text" v-model="company.address.state" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter state">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Postcode/Zip code</label>
                        <input type="text" v-model="company.address.postcode" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter postcode">
                    </div>
                </div>
            </div>

            <!-- Error Message -->
            <div v-if="errorMsg" class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <p class="text-sm text-red-600">{{ errorMsg }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4">
                <button type="button"
                    class="rounded-xl px-6 py-2 text-sm font-medium text-gray-900 border border-gray-500 hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="rounded-xl px-6 py-2 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600">
                    Create Company
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['countries'],
    data() {
        return {
            company: {
                name: null,
                address: {
                    country: null,
                    line: null,
                    line2: null,
                    city: null,
                    state: null,
                    postcode: null,
                },
                phone_number: null,
            },
            errorMsg: null
        }
    },
    computed: {
    },
    methods: {
        createCompany() {
            this.errorMsg = null;
            console.log(this.company);

            axios.post('/choose/company/create', this.company)
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
        console.log(this.countries)
    },
}
</script>
