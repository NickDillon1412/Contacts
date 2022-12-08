<script setup>
import BlankUser from "@/Components/BlankUser.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    username: "",
    email: "",
    phone: "",
});
</script>

<template>
    <Head title="Edit - Nick Dillon" />

    <div class="pt-6">
        <div class="mx-auto px-5">
            <div
                class="flex items-center justify-between text-center mx-auto mb-2"
            ></div>
            <BlankUser class="mb-2">N</BlankUser>
            <h1 class="text-3xl font-bold">Nick Dillon</h1>

            <div class="w-full sm:max-w-md mt-4 py-4 overflow-hidden">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Nick Dillon"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="username" value="Username" />

                        <TextInput
                            id="username"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.username"
                            required
                            autocomplete="username"
                            placeholder="nickdillon1412"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.username"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                            placeholder="nickhds@gmail.com"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="phone" value="Phone" />

                        <TextInput
                            id="phone"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.phone"
                            required
                            autocomplete="username"
                            placeholder="217-549-2621"
                        />

                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div class="flex items-center mt-4">
                        <PrimaryButton
                            class="flex justify-center w-full mt-3 py-2 bg-red-400 border-2 hover:bg-white hover:border-red-400 hover:text-red-400"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
