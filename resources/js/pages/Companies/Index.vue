<script setup lang='ts'>
import { Head, Link } from '@inertiajs/vue3';
import type { Company } from '@/types';
import Nav from '@/components/Nav.vue';

defineProps<{
    companies: Company[],
}>();
</script>

<template>
    <Head title='Companies' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Companies</h1>

        <div>
            <div
                v-for='company in companies'
                :key='company.id'
                class='p-8 not-first-of-type:mt-6 bg-neutral-200'
            >
                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Name:</span>
                    {{ company.name }}
                </div>

                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Description:</span>
                    {{ company.description }}
                </div>

                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Employees:</span>
                    {{ company.number_of_employees }}
                </div>

                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Website:</span>
                    {{ company.website }}
                </div>

                <Link
                    :href='`/companies/${company.id}`'
                    class='inline-block px-3 py-1 bg-blue-700 text-white'
                >
                    View
                </Link>
            </div>
        </div>

        <div class='mt-6 flex justify-center'>
            <Link
                href='/companies/create'
                class='px-3 py-1 bg-green-700 text-white'
            >
                + New Company
            </Link>
        </div>
    </main>
</template>
