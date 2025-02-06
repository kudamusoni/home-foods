<template>
    <div class="layout-content-container flex flex-col flex-1">
        <div class="flex flex-wrap pb-4">
            <p class="text-gray-900 tracking-light text-[32px] font-bold leading-tight min-w-72">Users</p>
        </div>
        <div class="flex flex-wrap pb-4">
            <a href="/admin/users/invite">
                <button class="h-10 min-w-[84px] rounded-xl bg-orange-500 px-4 text-sm font-bold">
                    <span class="truncate">Invite users</span>
                </button>
            </a>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <!-- Search Bar -->
            <div class="flex-1 min-w-[240px]">
                <div class="relative">
                    <input type="text" placeholder="Search users..."
                        class="w-full rounded-xl border border-gray-500 px-4 py-2 text-sm text-gray-900 focus:outline-none focus:border-orange-500" />
                </div>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-gray-500">
            <table class="w-full">
                <!-- Table Header -->
                <thead>
                    <tr class="border-b border-gray-500 bg-gray-100">
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Email</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-500">
                    <tr class="hover:bg-gray-200" v-for="user in users" :key="user.id" @click="goToUser(user.id)">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ user.email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: ['users'],
    computed: {
    },
    methods: {
        goToUser(id) {
            return window.location.href = `/admin/user/edit/${id}`;
        }
    },
    mounted() {
        // console.log(this.users)
    },
}
</script>

<style></style>
