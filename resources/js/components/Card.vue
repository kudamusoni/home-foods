<template>
  <div class="max-w-md rounded overflow-hidden shadow-lg bg-white w-full">
    <div class="relative h-44 w-full">
      <img
        :src="imageUrl || '/placeholder.svg?height=300&width=400'"
        :alt="title"
        class="absolute inset-0 w-full h-full object-contain"
      />
    </div>
    <div class="px-6 py-4">
      <h2 class="font-bold text-xl mb-2 text-gray-800">{{ title }}</h2>
      <p class="text-gray-600 text-base">{{ description }}</p>
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
