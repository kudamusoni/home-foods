<template>
    <form @submit.prevent="registerUser">
        <div class="flex flex-col justify-evenly gap-4 w-full">
            <div class="flex flex-col">
                <label for="firstName">Name:</label>
                <input type="text" name="firstName" :value="user.name" disabled class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6 w-full disabled:bg-gray-300 disabled:text-gray-500 disabled:border-gray-300 disabled:cursor-not-allowed">
            </div>

            <div class="flex flex-col">
                <label for="firstName">Email:</label>
                <input type="text" name="email" :value="user.email" disabled class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6 w-full disabled:bg-gray-300 disabled:text-gray-500 disabled:border-gray-300 disabled:cursor-not-allowed">
            </div>

            <div class="flex flex-col">
                <label for="firstName">Country:</label>
                <select required v-model="userData.address.country" type="text" name="country" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="Country">
                    <option value="" selected disabled>Select country</option>
                    <option v-for="country in countries" :key="country.iso_code" :value="country.iso_code">{{ country.name }}</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="firstName">Phone Number:</label>
                <input required v-model="userData.phone_number" type="text" name="line1" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="Phone Number">
            </div>

            <div class="flex flex-col">
                <label for="firstName">Address:</label>
                <input required v-model="userData.address.line1" type="text" name="line1" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="Address">
            </div>

            <div class="flex flex-col">
                <label for="firstName">Address 2:</label>
                <input v-model="userData.address.line2" type="text" name="line2" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="Apartment, suite, etc. (Optional)">
            </div>

            <div class="flex flex-col">
                <label for="firstName">City:</label>
                <input v-model="userData.address.city" type="text" name="city" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="City">
            </div>

            <div class="flex flex-col">
                <label for="firstName">County/State:</label>
                <input v-model="userData.address.state" type="text" name="state" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="State">
            </div>

            <div class="flex flex-col">
                <label for="firstName">Postcode/Zip code:</label>
                <input v-model="userData.address.postcode" type="text" name="postcode" class="rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="Postcode">
            </div>

            <div v-if="errorMsg" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ errorMsg }}</strong>
            </div>

            <button
                class="bg-gradient-to-r from-indigo-500 to-orange-500 py-2 px-6 border rounded-2xl w-full text-white font-bold" type="submit">Register</button>
        </div>
    </form>
</template>


<!-- Pass User as prop into page -->
<!-- Populate inputs for name and email and disable them -->
<!-- Check if you have to do any csrf stuff for post req -->
<!-- Post the data and store it -->


<script>
export default {
        props: ['user', 'countries'],
        data() {
            return {
                userData: {
                    address: {
                        country: null,
                        line1: null,
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
            registerUser() {
                this.errorMsg = null;
                console.log(this.userData);

                axios.post('/choose/user/register', this.userData)
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
            console.log(this.user, this.countries)
        },
    }
</script>
