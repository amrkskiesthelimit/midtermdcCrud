<template>
    <AuthenticatedLayout>
      <template #header >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
          Add New Product
        </h2>
      </template>
      <div class="mt-8 max-w-md mx-auto bg-white rounded-lg border border-gray-200 p-6 shadow-lg">
        <form @submit.prevent="addProduct" enctype="multipart/form-data">
          <div class="mb-4">
            <label class="form-label" for="brand">Brand</label>
            <input
              v-model="form.brand"
              id="brand"
              type="text"
              placeholder="Brand"
              class="form-input"
            />
          </div>
          <div class="mb-4">
            <label class="form-label" for="name">Name</label>
            <input
              v-model="form.name"
              id="name"
              type="text"
              placeholder="Name"
              class="form-input"
            />
          </div>
          <div class="mb-4">
            <label class="form-label" for="description">Description</label>
            <textarea
              v-model="form.description"
              id="description"
              type="text"
              placeholder="Enter the product description..."
              class="form-textarea"
            ></textarea>
          </div>
          <div class="flex mb-4 -mx-2">
            <div class="w-1/3 px-2">
              <label class="form-label" for="retailPrice">Retail Price</label>
              <input
                v-model="form.retailPrice"
                id="retailPrice"
                type="number"
                placeholder="Retail Price"
                class="form-input"
              />
            </div>
            <div class="w-1/3 px-2">
              <label class="form-label" for="stock">Stock</label>
              <input
                v-model="form.stock"
                id="stock"
                type="number"
                placeholder="Stock"
                class="form-input"
              />
            </div>
            <div class="w-1/3 px-2">
              <label class="form-label" for="category">Category</label>
              <input
                v-model="form.category"
                id="category"
                type="text"
                placeholder="Category"
                class="form-input"
              />
            </div>
          </div>
          <div class="mb-6">
            <label class="form-label" for="thumbnail">Thumbnail</label>
            <input
              type="file"
              id="thumbnail"
              @change="onFileChange"
              class="form-input"
            />
          </div>
          <div class="flex items-center justify-center">
            <button
              type="submit"
              class="form-button"
            >
              Add Product
            </button>
          </div>
        </form>
      </div>
      <FullContentModal1
        :visible="modalVisible"
        :content="modalContent"
        :title="modalTitle"
        @close="closeModal"
      />
    </AuthenticatedLayout>
  </template>

  <script setup>
  import { ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { router } from '@inertiajs/vue3';
  import FullContentModal1 from '@/Components/FullContentModal1.vue';


  const form = ref({
    brand: '',
    name: '',
    description: '',
    retailPrice: '',
    stock: '',
    category: '',
    thumbnail: null,
  });

  const addProduct = async () => {
    const formData = new FormData();
    formData.append('brand', form.brand);
    formData.append('name', form.name);
    formData.append('description', form.description);
    formData.append('retail_price', form.retailPrice);
    formData.append('qty_stock', form.stock);
    formData.append('category_id', form.category);
    formData.append('thumbnail', form.thumbnail);

    try {
      await router.post('/products', formData);
      resetForm();
      openModal('Product created successfully.');
    } catch (error) {
      // Handle errors, display validation messages, etc.
      if (error.response && error.response.status === 422) {
        const validationErrors = error.response.data.errors;
        console.log(validationErrors);
        // Handle validation errors here
      }
    }
  };

  const onFileChange = (e) => {
    form.thumbnail = e.target.files[0];
  };

  const resetForm = () => {
    form.brand = '';
    form.name = '';
    form.description = '';
    form.retailPrice = '';
    form.stock = '';
    form.category = '';
    form.thumbnail = null;
  };

  const modalVisible = ref(false);
  const modalContent = ref('');
  const modalTitle = ref('');
  </script>

  <style scoped>
    /* Custom form styles */
    .form-label {
      font-weight: bold;
      margin-bottom: 0.5rem;
      color: #333;
    }

    .form-input {
      border: 1px solid #ccc;
      padding: 0.5rem;
      border-radius: 0.25rem;
      width: 100%;
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .form-textarea {
      border: 1px solid #ccc;
      padding: 0.5rem;
      border-radius: 0.25rem;
      width: 100%;
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .form-button {
      background-color: #3490dc;
      color: #fff;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 0.25rem;
      font-size: 1rem;
      cursor: pointer;
    }

    .form-button:hover {
      background-color: #2779bd;
    }
  </style>
