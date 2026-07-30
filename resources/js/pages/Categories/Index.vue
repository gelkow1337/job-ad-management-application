<script setup lang='ts'>
import Nav from '@/components/Nav.vue';
import { Head, Link } from '@inertiajs/vue3';
import type { Category } from '@/types';

defineProps<{
    categories: Category[],
}>();
</script>

<template>
    <Head title='Categories' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Categories</h1>

        <div>
            <div
                v-for='category in categories'
                :key='category.id'
                class='p-8 not-first-of-type:mt-6 bg-neutral-200'
            >
                <div class='mb-4'>
                    <span class='inline-block w-16 font-semibold'>Name:</span>
                    {{ category.name }}
                </div>

                <Link
                    :href='`/categories/${category.id}`'
                    class='inline-block px-3 py-1 bg-blue-700 text-white'
                >
                    View
                </Link>
            </div>
        </div>

        <div class='mt-6 flex justify-center'>
            <Link
                href='/categories/create'
                class='px-3 py-1 bg-green-700 text-white'
            >
                + New Category
            </Link>
        </div>
    </main>
</template>
