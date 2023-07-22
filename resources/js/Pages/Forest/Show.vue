<script setup>
import {computed} from 'vue';
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({

    fires: Object,
    forest: Object
});


const forestName = computed(() => {

    return props.forest.NWCG_REPORTING_UNIT_NAME;
});


</script>

<template>
    <AppLayout :title="forestName">

        <div class="px-4 py-6 sm:px-6 lg:px-8">

            <!--Forest Details-->
            <div class="my-8">
                <div class="text-2xl">Forest: <span class="font-bold">{{ forest.NWCG_REPORTING_UNIT_NAME }}</span></div>
            </div>

            <!--List of Fires-->

            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">List of Fires</h1>
                    <p class="mt-2 text-sm text-gray-700">Check the List of Fires</p>
                </div>

            </div>

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th scope="col" class="py-2 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">FPA ID</th>
                                    <th scope="col" class="px-3 py-2 text-left text-sm font-semibold text-gray-900">Fire Name</th>
                                    <th scope="col" class="px-3 py-2 text-left text-sm font-semibold text-gray-900">Discovery Date</th>
                                    <th scope="col" class="px-3 py-2 text-left text-sm font-semibold text-gray-900">Cause</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                <tr v-for="fire in fires" :key="fire.FPA_ID" class="even:bg-gray-50">
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ fire.FPA_ID }}</td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ fire.FIRE_NAME }}</td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ fire.discovery_date }}</td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ fire.STAT_CAUSE_DESCR }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


