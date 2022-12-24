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

    <div class="py-2 px-5 mb-6 bg-white">
        <div class="max-w-7xl mx-auto sm:px-3">
            <div
                class="p-4 sm:p-6"
            >
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                    class="max-w-xl"
                />
            </div>

            <div
                class="px-4 sm:px-6"
            >
                <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div
                class="p-4 sm:p-6"
            >
                <DeleteUserForm class="max-w-xl" />
            </div>
        </div>
    </div>
</template>
