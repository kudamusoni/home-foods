<template>
    <h3 class="text-lg font-bold text-gray-900 px-4 pb-2 pt-4">Camping Food</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 auto-rows-max"
        v-for="product in products" :key="product.id">
        <Card :image-url="url" :title="product.name" :description="product.description" />
    </div>
</template>

<script>
import Card from "../components/Card.vue";
export default {
    components: { Card },
    props: ['products'],
    data() {
        return {
            url: 'https://media.istockphoto.com/id/1214396728/vector/red-car-icon-isolated-on-white-background-clip-art-car-red-cute-illustration-car-flat-simple.jpg?s=612x612&w=0&k=20&c=Lh5wvIsb1bXeZhBXXMLoLRsUQnp9ZmKmSBlLM-KTxEQ=',
            title: 'Title',
            description: 'Description'
        }
    },
    mounted() {
        console.log(this.products);
    }
}
</script>
