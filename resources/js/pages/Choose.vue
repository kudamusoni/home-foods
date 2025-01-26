<template>
    <div class="flex items-center justify-center h-full">
        <div class="flex gap-3">
            <a href="/choose/user">
                <button
                    class="bg-gradient-to-r from-indigo-500 to-orange-500 py-4 px-6 border rounded-2xl w-full text-white">Joining as a Customer</button>
            </a>

            <a href="/choose/company">
                <button
                    class="bg-gradient-to-r from-indigo-500 to-orange-500 py-4 px-6 border rounded-2xl w-full text-white">Joining as a Company</button>
            </a>
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
