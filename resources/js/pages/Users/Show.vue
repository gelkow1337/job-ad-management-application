<script setup lang='ts'>
import { Head, Link } from '@inertiajs/vue3'
import type { User } from '@/types'
import Nav from '@/components/Nav.vue';

const props = defineProps<{
  user: User,
}>();
</script>

<template>
    <Head title='Job Details' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>User Details</h1>

        <div class='p-8 bg-neutral-200'>
            <div class='mb-4'>
                <span class='inline-block w-30 font-semibold'>Username:</span>
                {{ user.name }}
            </div>

            <div class='mb-4 mt-1'>
                <span class='inline-block w-30 font-semibold'>Email:</span>
                {{ user.email }}
            </div>

            <div class='mb-4 mt-1'>
                <span class='inline-block w-30 font-semibold'>Company:</span>
                {{ user.company_id }}
            </div>

            <div class='flex gap-2'>
                <Link
                    href='/users'
                    class='px-3 py-1 bg-blue-700 text-white'
                >
                    Go Back
                </Link>

                <Link :href='`/users/${user.id}/edit`'
                    class='px-3 py-1 bg-orange-700 text-white'>
                    Edit
                </Link>
            </div>
        </div>
    </main>
</template>
