<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { User } from '@/types';

defineProps<{
    user: User;
}>();
</script>

<template>
    <Head title="User Details" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">User Details</h1>

        <div class="bg-neutral-200 p-8">
            <div class="mb-4">
                <span class="inline-block w-30 font-semibold">Username:</span>
                {{ user.name }}
            </div>

            <div class="mt-1 mb-4">
                <span class="inline-block w-30 font-semibold">Email:</span>
                {{ user.email }}
            </div>

            <div class="mt-1 mb-4">
                <span class="inline-block w-30 font-semibold">Company:</span>
                {{ user.company?.name || '-' }}
            </div>

            <div class="flex gap-2">
                <Link href="/users" class="bg-blue-700 px-3 py-1 text-white">
                    Go Back
                </Link>

                <Link
                    :href="`/users/${user.id}/edit`"
                    class="bg-orange-700 px-3 py-1 text-white"
                >
                    Edit
                </Link>
            </div>
        </div>
    </main>
</template>
