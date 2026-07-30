<script setup lang="ts">
import { Head, useForm, router } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { Category } from '@/types';

const props = defineProps<{
    category: Category;
}>();

const form = useForm({
    name: props.category.name ?? '',
});

const submit = () => {
    form.put(`/categories/${props.category.id}`);
};

const deleteCategory = () => {
    if (confirm('Do you really want to delete this category?')) {
        router.delete(`/categories/${props.category.id}`);
    }
};

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <Head title="Edit Category" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Edit Category</h1>

        <div class="bg-neutral-200 p-8">
            <form @submit.prevent="submit">
                <label class="mb-1 block">Name *</label>
                <input
                    required
                    v-model="form.name"
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
                        @click="deleteCategory"
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
