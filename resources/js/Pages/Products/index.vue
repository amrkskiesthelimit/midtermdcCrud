<template>
    <AuthenticatedLayout>



        <div class="py-8 mx-auto max-w-7xl">

        <div v-if="$page.props.auth.user.permissions.includes('make-sales')">
            <Link :href="'/products/create'">
          <button class="bg-blue-500 text-black rounded-lg border-2 border-solid hover:border-blue-500 hover:bg-gray-50 hover:text-gray-700 px-3 py-1 mb-2"><i class="fa-solid fa-cart-plus"></i>
            Add Products
          </button>
        </Link>
      </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

          <div v-for="product in products.data" :key="product.id" class="bg-white shadow-sm sm:rounded-lg p-4">
            <div @click="openModal(product.thumbnail, product.name, 'Thumbnail')" class="cursor-pointer">
              <img :src="product.thumbnail" @error="imageError" class="object-cover h-40 w-full rounded" alt="Product image">
            </div>
            <h2 class="text-lg font-semibold mt-4">{{ product.name }}</h2>
            <p class="text-gray-500">{{ product.brand }}</p>
            <p class="mt-4 text-gray-600">{{ product.description }}</p>
            <div class="flex justify-between items-center mt-4">
              <span class="text-lg font-semibold">{{ product.retail_price }}</span>
              <span class="text-gray-700">{{ product.qty_stock }} in stock</span>
            </div>
            <div class="mt-4 flex justify-between items-center">
              <span class="text-gray-700">{{ product.category_id }}</span>
              <div class="space-x-2">
                <button @click="openModal('Deleted successfully')" class="text-red-600 hover:text-red-700 focus:outline-none">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
                <button @click="openModal('Edited successfully')" class="text-green-600 hover:text-green-700 focus:outline-none">
                  <i class="fa-regular fa-pen-to-square m-2"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <Pagination :links="products.links" class="mt-4 flex justify-center" />
      </div>
      <FullContentModal :visible="modalVisible" :content="modalContent" :title="modalTitle" @close="closeModal" />
    </AuthenticatedLayout>
  </template>

  <script setup>
  import { defineProps, ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import Pagination from '@/Components/Pagination.vue';
  import FullContentModal from '@/Components/FullContentModal.vue';
  import { Link } from '@inertiajs/vue3';

  const props = defineProps({
    products: Object,
  });

  const modalVisible = ref(false);
  const modalContent = ref('');
  const modalTitle = ref('');



  const imageError = () => {
    // Handle image load errors if needed
  };
  </script>

<style scoped>
/* Add your scoped CSS styles here */
body {
  background: linear-gradient(to bottom, rgb(30, 11, 11), white);
  margin: 0;
  padding: 0;
}

/* Additional styling for your page content goes here */
</style>
