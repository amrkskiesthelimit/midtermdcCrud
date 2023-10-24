<template>
    <div v-if="visible" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- ... more modal code ... -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                  {{ title }}
                </h3>
                <div class="mt-2">
                  <!-- Check if content is an image URL -->
                  <img v-if="isImageUrl(content)" :src="content" class="my-4 max-w-full h-auto rounded" alt="Content Image" onerror="this.onerror=null;this.src='path/to/your/default-image.jpg';" style="max-height: 60vh;">

                  <!-- If content is not an image URL, render it as text -->
                  <p v-else class="text-sm text-gray-500">
                    {{ content }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" @click="closeModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { defineProps, defineEmits } from 'vue';

  const props = defineProps({
    content: String,
    title: String,
    visible: Boolean,
  });

  const emit = defineEmits(['close']);

  const closeModal = () => {
    emit('close');
  };

  // Function to check if the content string is a URL to an image
  const isImageUrl = (str) => {
    return (/\.(jpeg|jpg|gif|png)$/i).test(str);
  };
  </script>

  <style scoped>
  /* Add your scoped CSS styles here */
  </style>
