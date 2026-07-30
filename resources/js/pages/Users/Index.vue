<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { User } from '@/types';

defineProps<{
    users: User[];
}>();
</script>

<template>
    <Head title="Users" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Users</h1>

        <div>
            <div
                v-for="user in users"
                :key="user.id"
                class="bg-neutral-200 p-8 not-first-of-type:mt-6"
            >
                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Username:</span
                    >
                    {{ user.name }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold">Email:</span>
                    {{ user.email }}
                </div>

                <div class="mb-4">
                    <span class="inline-block w-30 font-semibold"
                        >Company:</span
                    >
                    {{ user.company?.name || '-' }}
                </div>

                <div class="flex gap-2">
                    <Link
                        :href="`/users/${user.id}`"
                        class="bg-blue-700 px-3 py-1 text-white"
                    >
                        View
                    </Link>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <Link
                href="/users/create"
                class="inline-block bg-green-700 px-3 py-1 text-white"
            >
                + New User
            </Link>
        </div>
    </main>
</template>
