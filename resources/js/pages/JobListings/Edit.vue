<script setup lang="ts">
import { Head, useForm, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import type { JobListing, Company, Category } from '@/types';

const props = defineProps<{
    jobListing: JobListing;
    companies: Company[];
    categories: Category[];
}>();

const form = useForm({
    company_id: props.jobListing.company_id ?? '',
    title: props.jobListing.title ?? '',
    description: props.jobListing.description ?? '',
    location: props.jobListing.location ?? '',
    salary: props.jobListing.salary ?? '',
    categories: props.jobListing.categories?.map((c) => c.id) || [],
});

const submit = () => {
    form.put(`/jobs/${props.jobListing.id}`);
};

const deleteJob = () => {
    if (confirm('Do you really want to delete this job?')) {
        router.delete(`/jobs/${props.jobListing.id}`);
    }
};

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Edit Job" />

    <AppLayout>
        <main>
            <h1 class="mb-6 text-center text-2xl font-semibold">Edit Job</h1>

            <div class="bg-neutral-200 p-8">
                <form @submit.prevent="submit">
                    <label class="mb-1 block">Title *</label>
                    <input
                        required
                        v-model="form.title"
                        type="text"
                        class="mb-4 w-full border p-2"
                    />

                    <label class="mb-1 block">Company *</label>
                    <select
                        v-model="form.company_id"
                        class="mb-4 w-full border p-2"
                        required
                    >
                        <option value="" disabled>Select company...</option>

                        <option
                            v-for="company in companies"
                            :key="company.id"
                            :value="company.id"
                        >
                            {{ company.name }}
                        </option>
                    </select>

                    <label class="mb-1 block">Description *</label>
                    <textarea
                        required
                        v-model="form.description"
                        rows="4"
                        class="mb-4 w-full border p-2"
                    ></textarea>

                    <label class="mb-1 block">Location</label>
                    <input
                        v-model="form.location"
                        type="text"
                        class="mb-4 w-full border p-2"
                    />

                    <label class="mb-1 block">Salary</label>
                    <input
                        v-model="form.salary"
                        type="text"
                        class="mb-4 w-full border p-2"
                    />

                    <label class="mb-1 block">Categories</label>
                    <div class="mb-4">
                        <label
                            v-for="category in categories"
                            :key="category.id"
                            class="flex items-center gap-2"
                        >
                            <input
                                type="checkbox"
                                :value="category.id"
                                v-model="form.categories"
                            />
                            <span>{{ category.name }}</span>
                        </label>
                    </div>

                    <div class="flex gap-2">
                        <button
                            type="submit"
                            class="bg-blue-700 px-3 py-1 text-white"
                        >
                            Save
                        </button>

                        <button
                            @click="deleteJob"
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
    </AppLayout>
</template>
