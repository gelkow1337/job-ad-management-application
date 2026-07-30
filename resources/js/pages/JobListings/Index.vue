<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { JobListing } from '@/types';

defineProps<{
    jobListings: JobListing[];
}>();
</script>

<template>
    <Head title="Jobs" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Jobs</h1>

        <div>
            <div
                v-for="jobListing in jobListings"
                :key="jobListing.id"
                class="bg-neutral-200 p-8 not-first-of-type:mt-6"
            >
                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Job Title:</span
                    >
                    {{ jobListing.title }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Company:</span
                    >
                    {{ jobListing.company?.name }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Description:</span
                    >
                    {{ jobListing.description }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Location:</span
                    >
                    {{ jobListing.location || '-' }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold">Salary:</span>
                    {{ jobListing.salary ? jobListing.salary + ' $' : '-' }}
                </div>

                <div class="mb-6 flex">
                    <span class="inline-block w-30 font-semibold"
                        >Categories:</span
                    >

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

                <Link
                    :href="`/jobs/${jobListing.id}`"
                    class="inline-block bg-blue-700 px-3 py-1 text-white"
                >
                    View
                </Link>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <Link href="/jobs/create" class="bg-green-700 px-3 py-1 text-white">
                + New Job
            </Link>
        </div>
    </main>
</template>
