<!-- Your main component, e.g., ClientList.vue -->
<template>
    <Head title="Clients" />

    <AuthenticatedLayout>
      <div class="container-md mx-auto p-8 w-3/4 mt-4">
        <div class="flex justify-between items-center mb-3">
          <h1 class="text-3xl font-semibold text-dark hover:text-blue-600">Clients</h1>
          <button @click="openModal('Created new Client.')" class="bg-blue-500 text-black rounded-lg border-2 border-solid hover:border-blue-500 hover:bg-gray-50 hover:text-gray-700 px-3 py-1 bg-gray-50"><i class="fa-solid fa-user-plus"></i> Add Client</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <!-- Use ClientCard component for each client -->
          <ClientCard v-for="client in clients.data" :key="client.id" :client="client" />
        </div>

        <Pagination :links="clients.links" class="mt-6 flex justify-center"/>

      </div>
      <FullContentModal :visible="modalVisible" :content="modalContent" :title="modalTitle" @close="closeModal" />
    </AuthenticatedLayout>
  </template>

<script setup>
import { defineProps, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientCard from '@/Components/ClientCard.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import FullContentModal from '@/Components/FullContentModal.vue';

const props = defineProps({
  clients: Object,
});

const modalVisible = ref(false);
const modalContent = ref('');
const modalTitle = ref('');

const openModal = (content, actionType = 'new') => { // Use a variable like 'actionType' to determine the modal's context
  modalContent.value = content;
  if (actionType === 'new') {
    modalTitle.value = "Dummy Button, Doesn't actually work.";
  } else {
    modalTitle.value = "Client Details";
  }
  modalVisible.value = true;
};

const closeModal = () => {
  modalVisible.value = false;
};
</script>

<style scoped>
/* Add your scoped CSS styles here */
</style>

