<script setup lang='ts'>
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import Nav from '@/components/Nav.vue';
import type { BreadCrumb } from '@/types';

const page = usePage();

const breadCrumbs = computed<BreadCrumb[]>(() => {
    return (page.props.breadCrumbs as BreadCrumb[]) || [];
});
</script>

<template>
    <Nav />

    <div class='flex justify-center mb-2'>
        <span
            v-if='breadCrumbs.length > 0'
            v-for='(breadCrumb, index) in breadCrumbs'
            :key='index'
        >
            <span>/</span>

            <Link
                v-if='breadCrumb.href && index !== breadCrumbs.length - 1'
                :href='breadCrumb.href'
                :title='breadCrumb.label'
                class='text-blue-500 hover:underline'
            >
                {{ breadCrumb.label }}
            </Link>

            <span v-else>
                <span
                    :href='breadCrumb.href'
                    :title='breadCrumb.label'
                >
                    {{ breadCrumb.label }}
                </span>
            </span>
        </span>
    </div>

    <slot></slot>
</template>
