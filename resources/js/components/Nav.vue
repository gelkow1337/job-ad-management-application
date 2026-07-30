<script setup lang='ts'>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class='flex justify-center mt-4 mb-12'>
        <ul class='list-disc pl-4 flex gap-10'>
            <li>
                <Link href='/' class='hover:underline'>Home</Link>
            </li>
            <li>
                <Link href='/jobs' class='hover:underline'>Jobs</Link>
            </li>
            <li>
                <Link href='/categories' class='hover:underline'>Categories</Link>
            </li>
            <li>
                <Link href='/companies' class='hover:underline'>Companies</Link>
            </li>
            <li>
                <Link href='/users' class='hover:underline'>Users</Link>
            </li>
        </ul>
    </nav>
</template>
