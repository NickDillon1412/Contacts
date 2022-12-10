<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
</script>

<template>
    <Head title="Profile" />

    <div class="py-2 mb-6 bg-white">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 space-y-6">
            <div
                class="p-4 sm:p-8 mt-4 border-4 border-slate-600 shadow-lg rounded-lg"
            >
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                    class="max-w-xl"
                />
            </div>

            <div
                class="p-4 sm:p-8 border-4 border-slate-600 shadow-lg rounded-lg"
            >
                <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div
                class="p-4 sm:p-8 border-4 border-slate-600 shadow-lg rounded-lg"
            >
                <DeleteUserForm class="max-w-xl" />
            </div>
        </div>
    </div>
</template>
