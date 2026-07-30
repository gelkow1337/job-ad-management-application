<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';

const form = useForm({
    name: '',
});

const submit = () => {
    form.post('/categories');
};
</script>

<template>
    <Head title="Create Category" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Create Category</h1>

        <div class="mt-6 bg-neutral-200 p-8">
            <form @submit.prevent="submit">
                <label class="mb-1 block">Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="mb-4 w-full border border-neutral-500 p-2"
                />

                <div class="flex gap-2">
                    <button
                        type="submit"
                        class="bg-green-700 px-3 py-1 text-white"
                    >
                        Save
                    </button>

                    <Link
                        href="/categories"
                        class="bg-orange-700 px-3 py-1 text-white"
                    >
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </main>
</template>
