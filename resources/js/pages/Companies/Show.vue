<script setup lang='ts'>
import { Head, Link } from '@inertiajs/vue3'
import type { Company } from '@/types'
import Nav from '@/components/Nav.vue';

const props = defineProps<{
  company: Company,
}>();
</script>

<template>
    <Head title='Company Details' />
  
    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Company Details</h1>

        <div class='p-8 bg-neutral-200'>
            <div class='mb-4'>
                <span class='inline-block w-30 font-semibold'>Name:</span>
                {{ company.name }}
            </div>

            <div class='mb-4 mt-1'>
                <span class='inline-block w-30 font-semibold'>Description:</span>
                {{ company.description }}
            </div>

            <div class='mb-4 mt-1'>
                <span class='inline-block w-30 font-semibold'>Employees:</span>
                {{ company.number_of_employees }}
            </div>

            <div class='mb-4'>
                <span class='inline-block w-30 font-semibold'>Website:</span>
                {{ company.website }}
            </div>

            <div class='flex gap-2'>
                <Link
                    href='/companies'
                    class='px-3 py-1 bg-blue-700 text-white'
                >
                    Go Back
                </Link>

                <Link :href='`/companies/${company.id}/edit`'
                    class='px-3 py-1 bg-orange-700 text-white'>
                    Edit
                </Link>
            </div>
        </div>
    </main>
</template>
