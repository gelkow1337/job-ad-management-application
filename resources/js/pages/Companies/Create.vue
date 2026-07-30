<script setup lang='ts'>
import { Head, Link, useForm } from '@inertiajs/vue3'
import Nav from '@/components/Nav.vue';

const form = useForm({
    name: '',
    description: '',
    number_of_employees: '',
    website: '',
});

const submit = () => {
    form.post('/companies');
}
</script>

<template>
    <Head title='Create Company' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Create Company</h1>

        <div class='p-8 bg-neutral-200 mt-6'>
            <form @submit.prevent='submit'>
                <label class='block mt-4 mb-1'>Name *</label>
                <input v-model='form.name' type='text' class='w-full border border-neutral-500 p-2' />

                <label class='block mt-4 mb-1'>Description *</label>
                <textarea v-model='form.description' rows='4' class='w-full border border-neutral-500 p-2'></textarea>

                <label class='block mt-4 mb-1'>Employees *</label>
                <input v-model='form.number_of_employees' type='text' class='w-full border border-neutral-500 p-2' />

                <label class='block mt-4 mb-1'>Website *</label>
                <input v-model='form.website' type='text' class='w-full border border-neutral-500 p-2' />

                <div class='pt-4 flex gap-2'>
                    <button
                        type='submit'
                        class='bg-green-700 text-white px-3 py-1'
                    >
                        Save
                    </button>

                    <Link
                        href='/companies'
                        class='px-3 py-1 bg-orange-700 text-white'
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>
