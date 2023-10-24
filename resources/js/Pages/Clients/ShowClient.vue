<template>
    <div>
      <Head title="Client Details" />

      <AuthenticatedLayout>
        <div class="max-w-5xl mx-auto mt-8 p-4">
          <Link
            as="button"
            href="/clients"
            class="mb-4 px-4 py-2 bg-gray-200 text-gray-700 hover:bg-blue-100 rounded-lg focus:outline-none"
          ><i class="fa-solid fa-arrow-left"></i>
            Back to Clients
          </Link>

          <div class="bg-white p-4 rounded-lg shadow flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-1/2 p-4">
              <div class="space-y-4">
                <h1 class="text-2xl font-semibold">Client Details</h1>
                <p><strong>Full Name:</strong> {{ client.first_name }} {{ client.last_name }}</p>
                <p><strong>Address:</strong> {{ client.address }}</p>
                <p><strong>Phone:</strong> {{ client.phone }}</p>
                <p><strong>Credit Limit:</strong> {{ client.credit_limit }}</p>
              </div>
            </div>

            <div class="w-full md:w-1/2 p-4">
              <div class="space-y-4">
                <h2 class="text-xl font-bold">Transactions</h2>
                <table class="min-w-full divide-y divide-gray-200 shadow-sm">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                        <u> Date</u>
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                       <u> Cash/Credit</u>
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                        <u>Total</u>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="transaction in transactions" :key="transaction.id">
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ transaction.date }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ transaction.is_credit ? 'Credit' : 'Cash' }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ transaction.total_amount }}
                      </td>
                    </tr>
                  </tbody>
                </table>
                <p class="mt-4"><strong>Total Transactions:</strong> {{ transactionsTotal }}</p>
              </div>
            </div>
          </div>
        </div>
      </AuthenticatedLayout>
    </div>
  </template>

  <script setup>
  import { ref, computed } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link } from '@inertiajs/vue3';

  const props = defineProps({
    client: Object,
    transactions: Array,
  });

  const transactionsTotal = computed(() => {
    return props.transactions.reduce((total, transaction) => {
      return total + (transaction.total_amount || 0);
    }, 0);
  });
  </script>

  <style scoped>
  /* You can add any custom styles here. */
  </style>
