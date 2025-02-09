<template>
    <div class="layout-content-container flex flex-col flex-1">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-gray-900 text-[32px] font-bold leading-tight">Join Company</h1>
            <p class="text-gray-500 text-sm">Enter your company code to join an existing company</p>
        </div>

        <!-- Form -->
        <form @submit.prevent="joinCompany">
            <!-- Company Code Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Company Code</h2>

                <div class="grid gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Enter Company Join Code</label>
                        <input type="text" v-model="code" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500"
                            placeholder="Enter your company code">
                        <p class="mt-2 text-sm text-gray-500">Enter the code provided by your company administrator</p>
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
                    Join Company
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            code: null,
            errorMsg: null
        }
    },
    computed: {
    },
    methods: {
        joinCompany() {
            this.errorMsg = null;

            axios.post('/choose/company/join', {
                'code': this.code
            })
                .then(response => {
                    console.log(response.data);
                    window.location.href = "/admin/dashboard";
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
    },
}
</script>
