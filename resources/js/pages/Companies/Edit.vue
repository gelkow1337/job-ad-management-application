<script setup lang="ts">
import { Head, useForm, router } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { Company } from '@/types';

const props = defineProps<{
    company: Company;
}>();

const form = useForm({
    name: props.company.name,
    description: props.company.description,
    number_of_employees: props.company.number_of_employees,
    website: props.company.website,
});

const submit = () => {
    form.put(`/companies/${props.company.id}`);
};

const deleteCompany = () => {
    if (confirm('Do you really want to delete this job?')) {
        router.delete(`/companies/${props.company.id}`);
    }
};

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Edit Company" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Edit Company</h1>

        <div class="bg-neutral-200 p-8">
            <form @submit.prevent="submit">
                <label class="mb-1 block">Name *</label>
                <input
                    required
                    v-model="form.name"
                    type="text"
                    class="mb-4 w-full border p-2"
                />

                <label class="mb-1 block">Description *</label>
                <textarea
                    required
                    v-model="form.description"
                    rows="4"
                    class="mb-4 w-full border p-2"
                ></textarea>

                <label class="mb-1 block">Employees *</label>
                <input
                    required
                    v-model="form.number_of_employees"
                    type="text"
                    class="mb-4 w-full border p-2"
                />

                <label class="mb-1 block">Website *</label>
                <input
                    required
                    v-model="form.website"
                    type="text"
                    class="mb-4 w-full border p-2"
                />

                <div class="flex gap-2">
                    <button
                        type="submit"
                        class="bg-blue-700 px-3 py-1 text-white"
                    >
                        Save
                    </button>

                    <button
                        @click="deleteCompany"
                        type="button"
                        class="bg-red-700 px-3 py-1 text-white"
                    >
                        Delete
                    </button>

                    <button
                        class="bg-orange-700 px-3 py-1 text-white"
                        type="button"
                        @click="goBack"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </main>
</template>
