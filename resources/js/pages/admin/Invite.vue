<template>
    <div class="rounded-xl border border-gray-500 p-6">
        <div class="space-y-6">
            <!-- Invite Code Section -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">Current Invite Code</label>
                <div class="relative">
                    <input :type="type" :value="this.data.code" readonly
                        class="w-full rounded-xl border border-gray-500 pr-12 pl-4 py-2 text-sm text-gray-900 bg-gray-50 focus:outline-none focus:border-orange-500">
                    <button
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        @click="togglePassword">
                        <span class="text-sm">{{ btnText }}</span>
                    </button>
                </div>
            </div>

            <!-- Validity Information -->
            <div class="border-t border-gray-200 pt-4">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Code Validity</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Valid From</p>
                        <p class="text-sm font-medium text-gray-900">{{ validFrom }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Expires On</p>
                        <p class="text-sm font-medium text-gray-900">{{ expiresOn }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-sm text-gray-600">Time Remaining</p>
                        <p class="text-lg font-medium text-orange-500">{{ timeRemaining }}</p>
                    </div>
                </div>
            </div>

            <!-- Usage Information -->
            <div class="border-t border-gray-200 pt-4">
                <h3 class="text-sm font-medium text-gray-900 mb-2">Recent Usage</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Total Uses</span>
                            <span class="text-sm font-medium text-gray-900">{{ data.total_joins }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Last Used</span>
                            <span class="text-sm font-medium text-gray-900"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            errorMsg: null,
            type: 'password',
            btnText: 'Show',
            timeRemaining: null,
            timer: null
        }
    },
    computed: {
        validFrom() {
            return this.formatDate(this.data.created_at);
        },
        expiresOn() {
            return this.formatDate(this.data.expires_at)
        },
    },
    methods: {
        formatDate(date) {
            let dateObj = new Date(date);

            let formatted = new Intl.DateTimeFormat('en-US', {
                month: 'short',
                day: 'numeric',
                year: 'numeric',
                hour: 'numeric',
                minute: 'numeric'
            }).format(dateObj);

            console.log(formatted);

            return formatted;
        },
        togglePassword() {
            if (this.type === 'password') {
                this.type = 'text';
                this.btnText = 'Hide';
            } else {
                this.type = 'password';
                this.btnText = 'Show';
            }
        },
        getTimeRemaining() {
            const diffInMs = new Date(this.data.expires_at) - new Date();

            if (diffInMs <= 0) {
                this.timeRemaining = 'Expired';
                // Clear interval if expired
                if (this.timer) {
                    clearInterval(this.timer);
                }
                return;
            }

            const days = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diffInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diffInMs % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diffInMs % (1000 * 60)) / 1000);

            this.timeRemaining = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        },
        startTimer() {
            // Update immediately
            this.getTimeRemaining();
            // Then update every second
            this.timer = setInterval(() => {
                this.getTimeRemaining();
            }, 1000);


        }
    },
    mounted() {
        console.log(this.data, this.formatDate(this.data.created_at))
        this.startTimer();
    },
    beforeUnmount() {
        // Clean up interval when component is destroyed
        if (this.timer) {
            clearInterval(this.timer);
        }
    }
}
</script>

<style></style>
