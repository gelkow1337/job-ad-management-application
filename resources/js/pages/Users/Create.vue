<script setup lang='ts'>
import { Head, Link, useForm } from '@inertiajs/vue3'
import type { Company } from '@/types'
import Nav from '@/components/Nav.vue';

defineProps<{
    companies: Company[],
}>();

const form = useForm({
    name: '',
    email: '',
    company_id: null,
});

const submit = () => {
    form.post('/users');
}
</script>

<template>
    <Head title='Create User' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Create User</h1>

        <div class='p-8 bg-neutral-200 mt-6'>
            <form @submit.prevent='submit'>
                <label class='block mb-1'>Username *</label>
                <input required v-model='form.name' type='text' class='w-full border border-neutral-500 p-2' />

                <label class='block mt-4 mb-1'>Email *</label>
                <input required v-model='form.email' type='text' class='w-full border border-neutral-500 p-2' />

                <label class='block mt-4 mb-1'>Company</label>
                <select
                    v-model='form.company_id'
                    class='w-full border border-neutral-500 p-2'
                >
                    <option value='' disabled>Please select a company</option>

                    <option
                        v-for='company in companies'
                        :key='company.id'
                        :value='company.id'
                    >
                        {{ company.name }}
                    </option>
                </select>

                <div class='pt-4 flex gap-2'>
                    <button type='submit' class='bg-green-700 text-white px-3 py-1'>Create</button>

                    <Link
                        href='/users'
                        class='px-3 py-1 bg-orange-700 text-white'
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>

