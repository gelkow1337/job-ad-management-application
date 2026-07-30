<script setup lang='ts'>
import { Head, useForm, router } from '@inertiajs/vue3'
import Nav from '@/components/Nav.vue';
import { JobListing, Company, Category } from '@/types';

const props = defineProps<{
    jobListing: JobListing,
    companies: Company[],
    categories: Category[],
}>();

const form = useForm({
    company_id: props.jobListing.company_id ?? '',
    title: props.jobListing.title ?? '',
    description: props.jobListing.description ?? '',
    location: props.jobListing.location ?? '',
    salary: props.jobListing.salary ?? '',
    categories: props.jobListing.categories.map(c => c.id)
})

const submit = () => {
    form.put(`/jobs/${props.jobListing.id}`)
}

const deleteJob = () => {
    if (confirm('Do you really want to delete this job?')) {
        router.delete(`/jobs/${props.jobListing.id}`)
    }
}

const goBack = () => {
    window.history.back();
}
</script>

<template>
    <Head title='Edit Job' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Edit Job</h1>

        <div class='p-8 bg-neutral-200'>
            <form @submit.prevent='submit'>
                <label class='block mb-1'>Title *</label>
                <input
                    required
                    v-model='form.title'
                    type='text'
                    class='w-full border p-2 mb-4'
                />

                <label class='block mb-1'>Company *</label>
                <select
                    v-model='form.company_id'
                    class='w-full border p-2 mb-4'
                    required
                >
                    <option value='' disabled>Select company...</option>

                    <option
                        v-for='company in companies'
                        :key='company.id'
                        :value='company.id'
                    >
                        {{ company.name }}
                    </option>
                </select>


                <label class='block mb-1'>Description *</label>
                <textarea required v-model='form.description' rows='4' class='w-full border p-2 mb-4'></textarea>

                <label class='block mb-1'>Location</label>
                <input v-model='form.location' type='text' class='w-full border p-2 mb-4' />

                <label class='block mb-1'>Salary</label>
                <input v-model='form.salary' type='text' class='w-full border p-2 mb-4' />

                <label class='block mb-1'>Categories</label>
                <div class='mb-4'>
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

                <div class='flex gap-2'>
                    <button
                        type='submit'
                        class='px-3 py-1 bg-blue-700 text-white'
                    >
                        Save
                    </button>

                    <button
                        @click='deleteJob'
                        type='button'
                        class='px-3 py-1 bg-red-700 text-white'
                    >
                        Delete
                    </button>

                    <button
                        class='px-3 py-1 bg-orange-700 text-white'
                        type='button'
                        @click='goBack'
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </main>
</template>
