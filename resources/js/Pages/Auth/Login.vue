<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login" />

    <div class="flex flex-col items-center sm:pt-0 bg-white px-3">
        <div class="mt-16 flex flex-col justify-center items-center">
            <img src="@/../../resources/assets/lock.svg" class="mb-2" />
            <h1 class="text-3xl font-bold">Login to your account</h1>
            <div class="flex justify-center items-center mt-5">
                <h3>Don't have an account yet?</h3>
                <Link
                    :href="route('register')"
                    class="text-red-400 hover:underline ml-1 rounded-md focus:outline-none"
                    >Register Here!
                </Link>
            </div>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="flex items-center">
                            <Checkbox
                                name="remember"
                                v-model:checked="form.remember"
                            />
                            <span class="ml-2 text-sm text-gray-600"
                                >Remember me</span
                            >
                        </label>
                        <Link
                            :href="route('password.request')"
                            class="hover:underline text-sm text-red-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </Link>
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <PrimaryButton
                        class="flex justify-center w-full mt-3 py-2 bg-red-400 border-2 hover:bg-white hover:border-red-400 hover:text-red-400"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Login
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
