<template>
    <Head title="Users" />
    <AuthenticatedLayout>
      <div class="py-8 mx-auto max-w-3xl">
        <div class="bg-white shadow-sm sm:rounded-lg p-4">
          <h3 class="text-xl font-bold mb-4">Manage Users</h3>
          <button @click="openModal('Created new User.')" class="bg-blue-500 text-white rounded-lg px-3 py-1 hover:bg-blue-700 m-3"><i class="fa-sharp fa-solid fa-user-plus"></i> Add User</button>
          <div class="space-y-4">
            <div v-for="user in users.data" :key="user.id" class="border border-gray-200 rounded-lg p-4 hover:shadow-md">
              <div class="flex justify-between items-center">
                <h4 class="text-lg font-semibold">{{ user.name }}</h4>
                <div class="space-x-2">
                  <button @click="openModal('Deleted.', user.name)" class="text-red-600 hover:text-red-700 focus:outline-none">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                  <button @click="openModal('Edited successfully.', user.name)" class="text-green-600 hover:text-green-700 focus:outline-none">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </button>
                </div>
              </div>
              <p class="text-gray-600">{{ user.email }}</p>
            </div>
          </div>
          <Pagination :links="users.links" class="mt-4 flex justify-center" />
        </div>
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
    users: Object,
  });

  const modalVisible = ref(false);
  const modalContent = ref('');
  const modalTitle = ref('');


  </script>

  <style scoped>
  /* Add your scoped CSS styles here */
  </style>
