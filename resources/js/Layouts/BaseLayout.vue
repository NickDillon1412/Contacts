<script setup>
import Nav from "@/Components/Nav.vue";
</script>

<template>
    <div
        class="md:max-w-sm justify-center mx-auto md:border-[10px] md:border-slate-900 h-[880px] rounded-[30px] mt-5 mb-5"
    >
        <div class="bg-slate-900 relative">
            <div class="absolute top-0 inset-x-0 invisible md:visible">
                <div
                    class="bg-slate-900 rounded-b-[24px] h-4 w-36 mx-auto"
                ></div>
            </div>
            <Nav />

            <div class="bg-gray-100">
                <slot />
            </div>
        </div>
    </div>
</template>