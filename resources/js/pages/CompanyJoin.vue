<template>
    <form @submit.prevent="joinCompany">
        <div class="flex flex-col justify-evenly gap-4 w-full">
            <h1 class="font-bold text-2xl self-center mb-8">Join a Company</h1>

            <div class="flex flex-col">
                <label for="firstName">Enter Company Join Code:</label>
                <input v-model="code" type="text" name="code"
                    class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full"
                    placeholder="Company Name">
            </div>

            <div v-if="errorMsg" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">{{ errorMsg }}</strong>
            </div>

            <button
                class="bg-gradient-to-r from-indigo-500 to-orange-500 py-2 px-6 border rounded-2xl w-full text-white font-bold"
                type="submit">Register</button>
        </div>
    </form>
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
