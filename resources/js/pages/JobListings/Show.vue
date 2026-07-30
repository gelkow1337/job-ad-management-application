<script setup lang='ts'>
import { Head, Link } from '@inertiajs/vue3'
import type { JobListing } from '@/types'
import Nav from '@/components/Nav.vue';

const props = defineProps<{
  jobListing: JobListing,
}>();
</script>

<template>
    <Head title='Job Details' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Job Details</h1>

        <div class='p-8 bg-neutral-200'>
            <div class='mb-4'>
                <span class='inline-block w-30 font-semibold'>Job Title:</span>
                {{ jobListing.title }}
            </div>

            <div class='mb-4 mt-1'>
                <span class='inline-block w-30 font-semibold'>Company:</span>
                {{ jobListing.company?.name }}
            </div>

            <div class='mb-4 mt-1'>
                <span class='inline-block w-30 font-semibold'>Description:</span>
                {{ jobListing.description }}
            </div>

            <div class='mb-4'>
                <span class='inline-block w-30 font-semibold'>Location:</span>
                {{ jobListing.location || 'No value' }}
            </div>

            <div class='mb-4'>
                <span class='inline-block w-30 font-semibold'>Salary:</span>
                {{ jobListing.salary ? jobListing.salary + ' $' : 'No value' }}
            </div>

            <div class='mb-6 flex'>
                <span class='inline-block w-30 font-semibold'>Categories:</span>

                <div v-if='!jobListing.categories?.length'>-</div>

                <ul v-else>
                    <li
                        v-for='category in jobListing.categories'
                        :key='category.id'
                    >
                        {{ category.name }}
                    </li>
                </ul>
            </div>

            <div class='flex gap-2'>
                <Link
                    href='/jobs'
                    class='px-3 py-1 bg-blue-700 text-white'
                >
                    Go Back
                </Link>

                <Link :href='`/jobs/${jobListing.id}/edit`'
                    class='px-3 py-1 bg-orange-700 text-white'>
                    Edit
                </Link>
            </div>
        </div>
    </main>
</template>
