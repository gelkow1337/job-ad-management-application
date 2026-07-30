<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="mt-4 mb-12 flex justify-center">
        <ul class="flex list-disc gap-10 pl-4">
            <li>
                <Link href="/" class="hover:underline">Home</Link>
            </li>
            <li>
                <Link href="/jobs" class="hover:underline">Jobs</Link>
            </li>
            <li>
                <Link href="/categories" class="hover:underline"
                    >Categories</Link
                >
            </li>
            <li>
                <Link href="/companies" class="hover:underline">Companies</Link>
            </li>
            <li>
                <Link href="/users" class="hover:underline">Users</Link>
            </li>
        </ul>
    </nav>
</template>
