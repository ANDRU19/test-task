<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';


defineProps({
    title: String,
});


</script>

<template>
    <div>
        <Head :title="title" />



        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-screen-md mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="max-w-800 container mx-auto">
                <slot />
                </div>
            </main>
        </div>
    </div>
</template>
