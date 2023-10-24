<template>
    <div @click="open(client)" class="rounded-lg p-4 border-2 border-blue-400 shadow-md hover:bg-cyan-200 cursor-pointer" style="background: linear-gradient(90deg, rgb(127, 123, 123), white);">
      <div class="flex flex-col md:flex-row md:items-center">
        <div class="mb-3 md:mb-0 md:mr-4">
          <h3 class="text-2xl font-semibold text-blue-600">
            {{ client.first_name }} {{ client.last_name }}
          </h3>
          <p class="text-gray-700">Address: {{ client.address }}</p>
          <p class="text-gray-700">Phone: {{ client.phone }}</p>
        </div>
        <div class="flex items-center">
          <p class="text-gray-700 md:mr-6">Credit Limit: {{ client.credit_limit }}</p>
          <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none" @click="open(client)">
            View Details
          </button>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { router } from '@inertiajs/vue3';
  import { inject } from 'vue';

  const props = defineProps({
    client: Object,
  });

  function open(client) {
    router.visit('/clients/' + client.id);
  }
  </script>
