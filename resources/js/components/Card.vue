<template>
    <div class="flex flex-col gap-3 pb-3">
    <div class="relative h-44 w-full">
      <img
        :src="imageUrl || '/placeholder.svg?height=300&width=400'"
        :alt="title"
        class="absolute inset-0 w-full h-full object-contain"
        />
        <!-- class="w-full object-cover bg-cover bg-center bg-no-repeat rounded-xl" -->
    </div>
    <div class="">
      <h2 class="text-base font-medium text-gray-900">{{ title }}</h2>
      <p class="text-sm font-normal text-gray-500">{{ description }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Card',
  props: {
    imageUrl: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    }
  }
}
</script>
