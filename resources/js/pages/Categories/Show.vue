<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import type { Category } from '@/types';

defineProps<{
    category: Category;
}>();
</script>

<template>
    <Head title="Category Details" />

    <AppLayout>
        <main>
            <h1 class="mb-6 text-center text-2xl font-semibold">
                Category Details
            </h1>

            <div class="bg-neutral-200 p-8">
                <div class="mb-4 font-semibold">{{ category.name }}</div>

                <div class="flex gap-2">
                    <Link
                        href="/categories"
                        class="bg-blue-700 px-3 py-1 text-white"
                    >
                        Go Back
                    </Link>

                    <Link
                        :href="`/categories/${category.id}/edit`"
                        class="bg-orange-700 px-3 py-1 text-white"
                    >
                        Edit
                    </Link>
                </div>
            </div>
        </main>
    </AppLayout>
</template>
