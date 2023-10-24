<template>
    <div>
      <!-- Display client details -->
      <h1>{{ clientDetails.firstName }} {{ clientDetails.lastName }}</h1>
      <!-- Other details -->

      <!-- Display client transactions -->
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Cash/Credit</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="transaction in clientTransactions" :key="transaction.id">
            <td>{{ transaction.date }}</td>
            <td>{{ transaction.type }}</td>
            <td>{{ transaction.total }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script setup>
  import { defineProps, onMounted, ref } from 'vue';

  const props = defineProps({
    id: String,
  });

  const clientDetails = ref({});
  const clientTransactions = ref([]);

  // TODO: Fetch client details and transactions on mounted
  onMounted(async () => {
    // You'll need to replace this with actual API requests
    clientDetails.value = await fetchClientDetails(props.id);
    clientTransactions.value = await fetchClientTransactions(props.id);
  });

  // TODO: Define the fetchClientDetails and fetchClientTransactions functions
  </script>
