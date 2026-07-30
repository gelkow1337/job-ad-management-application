<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import type { JobListing } from '@/types';

defineProps<{
    jobListing: JobListing;
}>();
</script>

<template>
    <Head title="Job Details" />

    <AppLayout>
        <main>
            <h1 class="mb-6 text-center text-2xl font-semibold">Job Details</h1>

            <div class="bg-neutral-200 p-8">
                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold">Job Title:</span>
                    {{ jobListing.title }}
                </div>

                <div class="mt-1 mb-4">
                    <span class="inline-block w-30 font-semibold">Company:</span>
                    {{ jobListing.company?.name }}
                </div>

                <div class="mt-1 mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Description:</span
                    >
                    {{ jobListing.description }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold">Location:</span>
                    {{ jobListing.location || 'No value' }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold">Salary:</span>
                    {{ jobListing.salary ? jobListing.salary + ' $' : 'No value' }}
                </div>

                <div class="mb-6 flex">
                    <span class="inline-block w-30 font-semibold">Categories:</span>

                    <div v-if="!jobListing.categories?.length">-</div>

                    <ul v-else>
                        <li
                            v-for="category in jobListing.categories"
                            :key="category.id"
                        >
                            {{ category.name }}
                        </li>
                    </ul>
                </div>

                <div class="flex gap-2">
                    <Link href="/jobs" class="bg-blue-700 px-3 py-1 text-white">
                        Go Back
                    </Link>

                    <Link
                        :href="`/jobs/${jobListing.id}/edit`"
                        class="bg-orange-700 px-3 py-1 text-white"
                    >
                        Edit
                    </Link>
                </div>
            </div>
        </main>
    </AppLayout>
</template>
