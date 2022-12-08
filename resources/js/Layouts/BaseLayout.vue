<script setup>
import Nav from "@/Components/Nav.vue";
</script>

<template>
    <div class="bg-white max-w-md justify-center mx-auto mt-8">
        <div class="p-3 bg-gray-900 border-6 border-gray-900 rounded-[40px]">
            <Nav class="rounded-t-[30px]" />

            <div class="bg-gray-100 rounded-b-[30px]">
                <slot />
            </div>
        </div>
    </div>
</template>
