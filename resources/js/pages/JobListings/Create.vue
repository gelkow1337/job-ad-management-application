<script setup lang='ts'>
import { Head, Link, useForm } from '@inertiajs/vue3'
import type { Company, Category } from '@/types'
import Nav from '@/components/Nav.vue';

defineProps<{
    companies: Company[],
    categories: Category[],
}>();

const form = useForm({
    company_id: '',
    title: '',
    description: '',
    location: '',
    salary: '',
    categories: [] as Category[],
})

const submit = () => {
    form.post('/jobs');
}
</script>

<template>
    <Head title='Create Job' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Create Job</h1>

        <div class='p-8 bg-neutral-200 mt-6'>
            <form @submit.prevent='submit'>
                <label class='block mb-1'>Job Title *</label>
                <input required v-model='form.title' type='text' class='w-full border border-neutral-500 p-2' />

                <label class='block mt-4 mb-1'>Company *</label>
                <select
                    required
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

                <label class='block mt-4 mb-1'>Description *</label>
                <textarea required v-model='form.description' rows='4' class='w-full border border-neutral-500 p-2'></textarea>

                <label class='block mt-4 mb-1'>Location</label>
                <input v-model='form.location' type='text' class='w-full border border-neutral-500 p-2' />

                <label class='block mt-4 mb-1'>Salary</label>
                <input v-model='form.salary' type='text' class='w-full border border-neutral-500 p-2' />

                <div>
                    <label class='block mt-4 mb-1'>Categories</label>
                    <div>
                        <label
                            v-for='category in categories'
                            :key='category.id'
                            class='flex items-center gap-2'
                        >
                            <input
                                type='checkbox'
                                :value='category.id'
                                v-model='form.categories'
                            />
                            <span>{{ category.name }}</span>
                        </label>
                    </div>
                </div>

                <div class='pt-4 flex gap-2'>
                    <button type='submit' class='bg-green-700 text-white px-3 py-1'>Create</button>

                    <Link
                        href='/jobs'
                        class='px-3 py-1 bg-orange-700 text-white'
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>
