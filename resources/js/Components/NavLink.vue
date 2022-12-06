<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active
        ? "inline-flex items-center text-sm font-medium leading-5 text-gray-900"
        : "inline-flex items-center text-sm font-medium leading-5 text-gray-500"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
