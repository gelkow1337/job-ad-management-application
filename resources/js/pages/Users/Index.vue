<script setup lang='ts'>
import Nav from '@/components/Nav.vue';
import { Head, Link } from '@inertiajs/vue3';
import type { User } from '@/types';

defineProps<{
    users: User[],
}>();
</script>

<template>
    <Head title='Users' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Users</h1>

        <div>
            <div
                v-for='user in users'
                :key='user.id'
                class='p-8 not-first-of-type:mt-6 bg-neutral-200'
            >
                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Username:</span>
                    {{ user.name }}
                </div>

                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Email:</span>
                    {{ user.email }}
                </div>

                <div class='mb-4'>
                    <span class='inline-block w-30 font-semibold'>Company:</span>
                    {{ user.company?.name || '-' }}
                </div>

                <div class='flex gap-2'>
                    <Link
                        :href='`/users/${user.id}`'
                        class='px-3 py-1 bg-blue-700 text-white'
                    >
                        View
                    </Link>
                </div>
            </div>
        </div>


        <div class='mt-6 flex justify-center'>
            <Link
                href='/users/create'
                class='inline-block px-3 py-1 bg-green-700 text-white'
            >
                + New User
            </Link>
        </div>
    </main>
</template>
