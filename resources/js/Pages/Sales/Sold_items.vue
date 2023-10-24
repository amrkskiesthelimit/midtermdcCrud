<template>
    <Head title="Sales" />

    <AuthenticatedLayout>
      <div class="py-8 mx-auto max-w-4xl">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <div class="flex items-center mb-3">
            <h1 class="text-2xl font-semibold">Sales</h1>
            <div class="ml-4 space-x-2">
              <a href="/sales" class="text-blue-500 hover:text-blue-700 cursor-pointer" :class="{ 'active-link': $page.url === '/sales' }">Sales</a>
              <span class="text-gray-400">/</span>
              <a href="/soldItems" class="text-blue-500 hover:text-blue-700 cursor-pointer" :class="{ 'active-link': $page.url === '/soldItems' }">Sold Items</a>
            </div>
            <button @click="openModal('Success.')" class="bg-blue-500 text-white rounded-lg px-3 py-1 ml-auto hover:bg-blue-700 hover:text-gray-200">+ Add</button>
          </div>
        </div>
        <div class="mt-4 space-y-4">
          <div v-for="sold_item in sold_items.data" :key="sold_item.id">
            <div class="bg-white shadow-md sm:rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div class="font-semibold text-lg">{{ sold_item.sale_id }}</div>
                <div>
                  <button @click="openModal('Deleted successfully.')" class="text-red-600 hover:text-red-700 focus:outline-none">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                  <button @click="openModal('Edited successfully.')" class="text-green-600 hover:text-green-700 focus:outline-none">
                    <i class="fa-regular fa-pen-to-square m-2"></i>
                  </button>
                </div>
              </div>
              <div class="text-gray-500 mb-2">Product ID: {{ sold_item.product_id }}</div>
              <div class="text-gray-500 mb-2">Amount: {{ sold_item.amount }}</div>
              <div class="text-gray-500">Quantity: {{ sold_item.qty }}</div>
            </div>
          </div>
        </div>
        <Pagination :links="sold_items.links" class="mt-4 flex justify-center" />
      </div>
      <FullContentModal :visible="modalVisible" :content="modalContent" :title="modalTitle" @close="closeModal" />
    </AuthenticatedLayout>
  </template>

  <script setup>
  import { defineProps, ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import Pagination from '@/Components/Pagination.vue';
  import FullContentModal from '@/Components/FullContentModal.vue';

  const props = defineProps({
    sold_items: Object,
  });

  const modalVisible = ref(false);
  const modalContent = ref('');
  const modalTitle = ref('');


  </script>

  <style scoped>
  .active-link {
    font-weight: bold;
    text-decoration: underline;
  }
  </style>
