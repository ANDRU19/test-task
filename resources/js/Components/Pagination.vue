<script setup>
	import { computed } from "vue";
	import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/24/solid";
	import { Link } from "@inertiajs/vue3";

	const props = defineProps({
		data: Object,
	});

	const firstLink = computed(() => {
		return props.data?.links.slice(0)[0];
	});
	const lastLink = computed(() => {
		return props.data?.links.slice(-1)[0];
	});
</script>

<template>
	<div class="bg-white px-4 py-3 flex flex-col border-t border-gray-200 sm:px-6">
		<div class="flex-1 flex justify-between sm:hidden">
			<a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
			<a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
		</div>
		<div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">

			<div v-if="data.links.length">
				<nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
					<template v-for="link in data.links" :key="link.label">
						<!-- Previous Link  -->
						<template v-if="link === firstLink">
							<Link :href="link.url" :disabled="!link.url" as="button" type="button" v-if="link.url" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
								<span class="sr-only">Previous</span>
								<ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
							</Link>
							<a v-else :disabled="true" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
								<span class="sr-only">Previous</span>
								<ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
							</a>
						</template>

						<!-- Primary Link  -->
						<Link v-if="link !== firstLink && link !== lastLink && link.url" :href="link.url" as="button" type="button" class="relative inline-flex items-center inline-flex items-center text-sm font-medium border py-2 px-4" :class="[link.active ? 'z-10 bg-sky-50 border-cyan-500 text-indigo-500' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50']">
							{{ link.label }}
						</Link>

						<!-- Empty .. Link  -->
						<span v-if="link !== firstLink && link !== lastLink && !link.url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"> {{ link.label }}</span>

						<!-- Next Link  -->
						<template v-if="link === lastLink">
							<Link :href="link.url" :disabled="!link.url" v-if="link.url" as="button" type="button" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
								<span class="sr-only">Next</span>
								<ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
							</Link>

							<a v-else :disabled="true" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
								<span class="sr-only">Next</span>
								<ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
							</a>
						</template>
					</template>
				</nav>
			</div>

		</div>

        <div class="flex w-full mt-5">
            <p class="text-sm text-gray-700">
                Showing
                {{ " " }}
                <span class="font-medium">{{ data.from }}</span>
                {{ " " }}
                to
                {{ " " }}
                <span class="font-medium">{{ data.to }}</span>
                {{ " " }}
                of
                {{ " " }}
                <span class="font-medium">{{ data.total }}</span>
                {{ " " }}
                results
            </p>
        </div>

	</div>
</template>
