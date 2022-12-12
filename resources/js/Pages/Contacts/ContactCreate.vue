<script setup>
import BlankUser from "@/Components/BlankUser.vue";
import ImageUpload from "@/Components/ImageUpload.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    image: null,
    name: "",
    email: "",
    phone: "",
});

const submit = () => {
    form.post(route("contact.store"), {
        onFinish: () => form.reset("name", "email", "phone"),
    });
};
</script>

<template>
    <Head title="Create New Contact" />

    <div class="pt-12 bg-white">
        <div class="mx-auto px-7">
            <div class="w-full sm:max-w-md py-4 overflow-hidden">
                <form @submit.prevent="submit">
                    <div>
                        <div class="text-center mx-auto mb-6">
                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <label class="cursor-pointer">
                                    <BlankUser
                                        class="mb-2.5 w-20 h-20 text-2xl hover:border-2 hover:border-red-400 hover:bg-white"
                                        ><ImageUpload />
                                    </BlankUser>
                                    <input
                                        type="file"
                                        @input="
                                            form.image = $event.target.files[0]
                                        "
                                        class="hidden"
                                    />
                                </label>
                            </div>
                        </div>
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
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
                            autocomplete="phone"
                        />

                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div class="flex items-center mt-4">
                        <PrimaryButton
                            class="flex justify-center w-full mt-3 py-2 bg-red-400 border-2 hover:bg-white hover:border-red-400 hover:text-red-400"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Create
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
