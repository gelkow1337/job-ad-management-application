<script setup lang="ts">
import { Head, useForm, router } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { User, Company } from '@/types';

const props = defineProps<{
    user: User;
    companies: Company[];
}>();

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    company_id: props.user.company_id ?? null,
});

const submit = () => {
    form.put(`/users/${props.user.id}`);
};

const deleteUser = () => {
    if (confirm('Do you really want to delete this user?')) {
        router.delete(`/users/${props.user.id}`);
    }
};

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Edit User" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Edit User</h1>

        <div class="bg-neutral-200 p-8">
            <form @submit.prevent="submit">
                <label class="mb-1 block">Username *</label>
                <input
                    required
                    v-model="form.name"
                    type="text"
                    class="mb-4 w-full border p-2"
                />

                <label class="mb-1 block">Email *</label>
                <input
                    required
                    v-model="form.email"
                    class="mb-4 w-full border p-2"
                />

                <label class="mb-1 block">Company</label>
                <select
                    v-model="form.company_id"
                    class="mb-4 w-full border border-neutral-500 p-2"
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

                <div class="flex gap-2">
                    <button
                        type="submit"
                        class="bg-blue-700 px-3 py-1 text-white"
                    >
                        Save
                    </button>

                    <button
                        @click="deleteUser"
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
