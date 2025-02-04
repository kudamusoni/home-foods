<template>
    <div class="layout-content-container flex flex-col flex-1">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-gray-900 text-[32px] font-bold leading-tight">Edit User</h1>
            <p class="text-gray-500 text-sm">Edit a user to your inventory</p>
        </div>

        <!-- Form -->
        <form @submit.prevent="editProduct">
            <!-- Basic Info Card -->
            <div class="mb-8 rounded-xl border border-gray-500 p-6">
                <h2 class="mb-4 text-lg font-bold text-gray-900">Basic Information</h2>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Name</label>
                        <input type="text" v-model="user.name" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Email</label>
                        <input type="text" v-model="user.email" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Country</label>
                        <select v-model="user.country" required
                            class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500">
                            <option value="" selected disabled>Select a country</option>
                            <option v-for="country in countries" :key="country.iso_code" :value="country.iso_code">
                                {{ country.name }}
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
                    Update User
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['countries', 'user'],
    data() {
        return {
            errorMsg: null
        }
    },
    computed: {
    },
    methods: {
        editProduct() {
            this.errorMsg = null;

            console.log(this.user);

            const body = {
                name: this.user.name,
                email: this.user.email,
                country: this.user.country,
            };

            axios.put(`/admin/user/edit/${this.user.id}`, body)
                .then(response => {
                    console.log(response.data);
                    window.location.href = "/admin/users";
                })
                .catch(error => {
                    console.log(error.response.data.message);
                    this.setErrorMessage(error.response.data.message);
                });
        },
        setErrorMessage(msg) {
            this.errorMsg = msg;
            return true;
        },
    },
    mounted() {
        console.log(this.countries, this.user)
    },
}
</script>
