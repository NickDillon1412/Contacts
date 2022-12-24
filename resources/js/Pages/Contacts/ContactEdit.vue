<script setup>
import BlankUser from "@/Components/BlankUser.vue";
import ImageUpload from "@/Components/ImageUpload.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    contact: Object,
});

const form = useForm({
    id: props.contact.id,
    name: props.contact.name,
    email: props.contact.email,
    phone: props.contact.phone,
    image: Object,
});

const submit = () => {
    form.post(route("contact.update", form.id), {
        _method: "PUT",
        preserveState: true,
        onFinish: () => form.reset("name", "email", "phone"),
    });
};

const deleteContact = () => {
    form.delete(route("contact.destroy", form.id), {
        onFinish: () => form.reset("name", "email", "phone"),
    });
};
</script>

<template>
    <Head title="Edit Contact" />

    <div class="pt-12 bg-white">
        <div class="mx-auto px-7">
            <div class="text-center mx-auto">
                <div class="flex justify-center">
                    <BlankUser
                        v-if="!contact.image"
                        class="mb-2.5 w-20 h-20 text-2xl"
                        >{{ contact.initial }}</BlankUser
                    >
                </div>
                <h1 class="text-3xl font-bold">
                    {{ form.name }}
                </h1>
            </div>

            <div class="w-full sm:max-w-md mt-3.5 py-4 overflow-hidden">
                <form @submit.prevent="submit">
                    <div>
                        <div class="flex flex-wrap justify-center">
                            <div
                                class="w-6/12 flex flex-col items-center justify-center"
                            >
                                <label class="cursor-pointer">
                                    <img
                                        :src="props.contact.image"
                                        class="w-50 h-40 rounded-xl mb-5"
                                        alt="Contact Image"
                                    />
                                    <input
                                        id="image"
                                        name="image"
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
                            placeholder="Nick Dillon"
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
                            class="flex justify-center w-full mt-3 py-2 bg-indigo-500 border-2 hover:bg-white hover:border-indigo-500 hover:text-indigo-500"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </PrimaryButton>
                    </div>
                </form>

                <form @submit.prevent="deleteContact">
                    <div class="flex items-center">
                        <PrimaryButton
                            class="flex justify-center w-full mt-3 py-2 bg-red-500 border-2 hover:bg-white hover:border-red-500 hover:text-red-500"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Delete
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
