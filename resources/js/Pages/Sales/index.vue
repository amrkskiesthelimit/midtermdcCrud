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
            <button @click="openModal('Success.')" class="bg-blue-500 text-white rounded-lg px-3 py-1 ml-auto hover:bg-blue-700 hover:text-gray-200"><i class="fa-solid fa-cart-plus"></i> Add</button>
          </div>
        </div>
        <div class="mt-4">
          <div v-for="sale in sales.data" :key="sale.id" class="bg-white shadow-md sm:rounded-lg mb-4 p-4">
            <div class="flex items-center mb-2">
              <div class="font-semibold text-xl">{{ sale.id }}</div>
              <div class="ml-auto space-x-2">
                <button @click="openModal('Deleted successfully.')" class="text-red-600 hover:text-red-700 focus:outline-none">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
                <button @click="openModal('Edited successfully.')" class="text-green-600 hover:text-green-700 focus:outline-none">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
              </div>
            </div>
            <div class="text-gray-500 mb-2">Date: {{ sale.date }}</div>
            <div class="text-gray-500 mb-2">Client ID: {{ sale.client_id }}</div>
            <div class="text-gray-500">Is Credit: {{ sale.is_credit ? 'Yes' : 'No' }}</div>
          </div>
        </div>
        <Pagination :links="sales.links" class="mt-4 flex justify-center" />
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
    sales: Object,
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
