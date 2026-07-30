<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import type { Company } from '@/types';

defineProps<{
    companies: Company[];
}>();

const form = useForm({
    name: '',
    email: '',
    company_id: null,
});

const submit = () => {
    form.post('/users');
};
</script>

<template>
    <Head title="Create User" />

    <AppLayout>
        <main>
            <h1 class="mb-6 text-center text-2xl font-semibold">Create User</h1>

            <div class="mt-6 bg-neutral-200 p-8">
                <form @submit.prevent="submit">
                    <label class="mb-1 block">Username *</label>
                    <input
                        required
                        v-model="form.name"
                        type="text"
                        class="w-full border border-neutral-500 p-2"
                    />

                    <label class="mt-4 mb-1 block">Email *</label>
                    <input
                        required
                        v-model="form.email"
                        type="text"
                        class="w-full border border-neutral-500 p-2"
                    />

                    <label class="mt-4 mb-1 block">Company</label>
                    <select
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

                    <div class="flex gap-2 pt-4">
                        <button
                            type="submit"
                            class="bg-green-700 px-3 py-1 text-white"
                        >
                            Create
                        </button>

                        <Link
                            href="/users"
                            class="bg-orange-700 px-3 py-1 text-white"
                        >
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </main>
    </AppLayout>
</template>
