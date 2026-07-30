<script setup lang='ts'>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';

const form = useForm({
    name: '',
});

const submit = () => {
    form.post('/categories');
}
</script>

<template>
    <Head title='Create Category' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Create Category</h1>

        <div class='p-8 bg-neutral-200 mt-6'>
            <form @submit.prevent='submit'>
                <label class='block mb-1'>Name</label>
                <input v-model='form.name' type='text' class='w-full border border-neutral-500 p-2 mb-4' />

                <div class='flex gap-2'>
                    <button
                        type='submit'
                        class='bg-green-700 text-white px-3 py-1'
                    >
                        Save
                    </button>

                    <Link
                        href='/categories'
                        class='px-3 py-1 bg-orange-700 text-white'
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>
