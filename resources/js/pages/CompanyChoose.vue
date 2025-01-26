<template>
    <div class="flex items-center justify-center h-full">
        <div class="flex gap-3">
            <a href="/choose/company/join">
                <button
                    class="bg-gradient-to-r from-indigo-500 to-orange-500 py-4 px-6 border rounded-2xl w-full text-white">Joining an existing Company</button>
            </a>

            <a href="/choose/company/create">
                <button
                    class="bg-gradient-to-r from-indigo-500 to-orange-500 py-4 px-6 border rounded-2xl w-full text-white">Create a new Company</button>
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
