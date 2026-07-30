<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { Company, Category } from '@/types';

defineProps<{
    companies: Company[];
    categories: Category[];
}>();

const form = useForm({
    company_id: '',
    title: '',
    description: '',
    location: '',
    salary: '',
    categories: [] as Category[],
});

const submit = () => {
    form.post('/jobs');
};
</script>

<template>
    <Head title="Create Job" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Create Job</h1>

        <div class="mt-6 bg-neutral-200 p-8">
            <form @submit.prevent="submit">
                <label class="mb-1 block">Job Title *</label>
                <input
                    required
                    v-model="form.title"
                    type="text"
                    class="w-full border border-neutral-500 p-2"
                />

                <label class="mt-4 mb-1 block">Company *</label>
                <select
                    required
                    v-model="form.company_id"
                    class="w-full border border-neutral-500 p-2"
                >
                    <option value="" disabled>Please select a company</option>

                    <option
                        v-for="company in companies"
                        :key="company.id"
                        :value="company.id"
                    >
                        {{ company.name }}
                    </option>
                </select>

                <label class="mt-4 mb-1 block">Description *</label>
                <textarea
                    required
                    v-model="form.description"
                    rows="4"
                    class="w-full border border-neutral-500 p-2"
                ></textarea>

                <label class="mt-4 mb-1 block">Location</label>
                <input
                    v-model="form.location"
                    type="text"
                    class="w-full border border-neutral-500 p-2"
                />

                <label class="mt-4 mb-1 block">Salary</label>
                <input
                    v-model="form.salary"
                    type="text"
                    class="w-full border border-neutral-500 p-2"
                />

                <div>
                    <label class="mt-4 mb-1 block">Categories</label>
                    <div>
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
                </div>

                <div class="flex gap-2 pt-4">
                    <button
                        type="submit"
                        class="bg-green-700 px-3 py-1 text-white"
                    >
                        Create
                    </button>

                    <Link
                        href="/jobs"
                        class="bg-orange-700 px-3 py-1 text-white"
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>
