<script setup lang='ts'>
import { Head, useForm, router } from '@inertiajs/vue3'
import Nav from '@/components/Nav.vue';
import { Company } from '@/types';

const props = defineProps<{
    company: Company,
}>();

const form = useForm({
    name: props.company.name,
    description: props.company.description,
    number_of_employees: props.company.number_of_employees,
    website: props.company.website,
});

const submit = () => {
    form.put(`/companies/${props.company.id}`);
}

const deleteCompany = () => {
    if (confirm('Do you really want to delete this job?')) {
        router.delete(`/companies/${props.company.id}`)
    }
}

const goBack = () => {
    window.history.back();
}
</script>

<template>
    <Head title='Edit Company' />

    <Nav />

    <main>
        <h1 class='mb-6 text-2xl text-center font-semibold'>Edit Company</h1>

        <div class='p-8 bg-neutral-200'>
            <form @submit.prevent='submit'>
                <label class='block mb-1'>Name *</label>
                <input
                    required
                    v-model='form.name'
                    type='text'
                    class='w-full border p-2 mb-4'
                />

                <label class='block mb-1'>Description *</label>
                <textarea required v-model='form.description' rows='4' class='w-full border p-2 mb-4'></textarea>

                <label class='block mb-1'>Employees *</label>
                <input required v-model='form.number_of_employees' type='text' class='w-full border p-2 mb-4' />

                <label class='block mb-1'>Website *</label>
                <input required v-model='form.website' type='text' class='w-full border p-2 mb-4' />

                <div class='flex gap-2'>
                    <button
                        type='submit'
                        class='px-3 py-1 bg-blue-700 text-white'
                    >
                        Save
                    </button>

                    <button
                        @click='deleteCompany'
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
