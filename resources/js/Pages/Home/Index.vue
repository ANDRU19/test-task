<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    forests: Object

});
</script>

<template>
    <AppLayout title="Wildfires Home Page">

        <div class="px-2 sm:px-2 lg:px-8 py-20">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Wildfire History Explorer: Plan Safe Hikes in National Parks</h1>
                    <p class="mt-2 text-sm text-gray-700">Are you a passionate hiker planning to explore the beauty of national parks? Introducing Wildfire History Explorer, the ultimate app to help
                        you make informed decisions about your hiking adventures. Before you embark on your next journey, discover the comprehensive history of wildfires in the area. Our app provides
                        historical wildfire data, allowing you to assess the safety and suitability of your chosen destination. Stay informed, stay safe, and enjoy unforgettable hikes in the most
                        breathtaking national parks around the world. Happy hiking!</p>
                </div>
            </div>

                <!--Notification-->
            <div class="px-4 py-3 my-8 leading-normal text-xs text-indigo-700 border border-indigo-500 rounded-lg" role="alert">
                There could be a search field (but 1 hour for entire project is not enough to implement it :)
            </div>

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Forest Name</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Details</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="forest in forests.data" :key="forest.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ forest.name }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a :href="route('forest.show', encodeURIComponent(forest.name))" class="text-indigo-600 hover:text-indigo-900"
                                        >Check Fires<span class="sr-only">, {{ forest.name }}</span></a
                                        >
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <Pagination :data="forests"></Pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>


