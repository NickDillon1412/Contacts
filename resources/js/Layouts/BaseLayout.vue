<script setup>
import Nav from "@/Components/Nav.vue";
</script>

<template>
    <div
        class="max-w-lg justify-center mx-auto text-center md:border-[10px] md:border-slate-900 min-h-screen rounded-[30px]"
    >
        <div class="bg-slate-900 relative">
            <div class="absolute top-0 inset-x-0 invisible md:visible">
                <div
                    class="bg-slate-900 rounded-b-[24px] h-5 w-36 mx-auto"
                ></div>
            </div>
            <Nav />

            <div class="bg-gray-100">
                <slot />
            </div>
        </div>
    </div>
</template>
