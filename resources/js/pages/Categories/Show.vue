<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import type { Category } from '@/types'
import Nav from '@/components/Nav.vue';

const props = defineProps<{
    category: Category,
}>();
</script>

<template>
    <Head title='Category Details' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Category Details</h1>

        <div class='p-8 bg-neutral-200'>
            <div class='mb-4 font-semibold'>{{ category.name }}</div>

            <div class='flex gap-2'>
                <Link
                    href='/categories'
                    class='px-3 py-1 bg-blue-700 text-white'
                >
                    Go Back
                </Link>

                <Link
                    :href='`/categories/${category.id}/edit`'
                    class='px-3 py-1 bg-orange-700 text-white'
                >
                    Edit
                </Link>
            </div>
        </div>
    </main>
</template>
