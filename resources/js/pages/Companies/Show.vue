<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { Company } from '@/types';

defineProps<{
    company: Company;
}>();
</script>

<template>
    <Head title="Company Details" />

    <Nav />

    <main>
        <h1 class="mb-6 text-center text-2xl font-semibold">Company Details</h1>

        <div class="bg-neutral-200 p-8">
            <div class="mb-4">
                <span class="inline-block w-30 font-semibold">Name:</span>
                {{ company.name }}
            </div>

            <div class="mt-1 mb-4">
                <span class="inline-block w-30 font-semibold"
                    >Description:</span
                >
                {{ company.description }}
            </div>

            <div class="mt-1 mb-4">
                <span class="inline-block w-30 font-semibold">Employees:</span>
                {{ company.number_of_employees }}
            </div>

            <div class="mb-4">
                <span class="inline-block w-30 font-semibold">Website:</span>
                {{ company.website }}
            </div>

            <div class="flex gap-2">
                <Link
                    href="/companies"
                    class="bg-blue-700 px-3 py-1 text-white"
                >
                    Go Back
                </Link>

                <Link
                    :href="`/companies/${company.id}/edit`"
                    class="bg-orange-700 px-3 py-1 text-white"
                >
                    Edit
                </Link>
            </div>
        </div>
    </main>
</template>
