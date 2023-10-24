<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="page-background">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <strong>Lorem ipsum</strong> dolor sit amet, consectetur adipiscing elit. Sed euismod justo id odio hendrerit, sit amet feugiat nunc tincidunt. Proin euismod libero non lorem scelerisque, ac tincidunt nunc vestibulum. Quisque vel turpis a justo cursus congue. Sed ullamcorper, justo ac congue fermentum, dolor erat congue urna, in tincidunt felis augue non ex.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<style scoped>
.page-background {
    background-image: url('https://tse2.mm.bing.net/th?id=OIP.t1UbVWH7KdS2B6scs1NorgHaEK&pid=Api&P=0&h=180');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
}
</style>
