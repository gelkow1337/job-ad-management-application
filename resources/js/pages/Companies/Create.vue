<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';

const form = useForm({
    name: '',
    description: '',
    number_of_employees: '',
    website: '',
});

const submit = () => {
    form.post('/companies');
};
</script>

<template>
    <Head title="Create Company" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Create Company</h1>

        <div class="mt-6 bg-neutral-200 p-8">
            <form @submit.prevent="submit">
                <label class="mt-4 mb-1 block">Name *</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="w-full border border-neutral-500 p-2"
                />

                <label class="mt-4 mb-1 block">Description *</label>
                <textarea
                    v-model="form.description"
                    rows="4"
                    class="w-full border border-neutral-500 p-2"
                ></textarea>

                <label class="mt-4 mb-1 block">Employees *</label>
                <input
                    v-model="form.number_of_employees"
                    type="text"
                    class="w-full border border-neutral-500 p-2"
                />

                <label class="mt-4 mb-1 block">Website *</label>
                <input
                    v-model="form.website"
                    type="text"
                    class="w-full border border-neutral-500 p-2"
                />

                <div class="flex gap-2 pt-4">
                    <button
                        type="submit"
                        class="bg-green-700 px-3 py-1 text-white"
                    >
                        Save
                    </button>

                    <Link
                        href="/companies"
                        class="bg-orange-700 px-3 py-1 text-white"
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>
