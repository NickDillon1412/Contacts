<script setup>
import Nav from "@/Components/Nav.vue";
</script>

<template>
    <div class="mt-8 px-3">
        <div
            class="justify-center items-center mx-auto border-[12px] rounded-[40px] max-w-2xl mb-8"
        >
            <Nav class="rounded-t-[24px]" />

            <div class="bg-white rounded-b-[24px] min-h-screen">
                <slot />
            </div>
        </div>
    </div>
</template>
