<script setup>
import Arrow from "@/Components/Arrow.vue";
import LogoutImage from "@/Components/LogoutImage.vue";
import NavLink from "@/Components/NavLink.vue";
import ProfileImage from "@/Components/ProfileImage.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const contacts = ref([
    {
        id: 1,
        name: "Nick Dillon",
    },
    {
        id: 2,
        name: "Anna Dillon",
    },
    {
        id: 3,
        name: "Jacey Dillon",
    },
    {
        id: 4,
        name: "Brady Dillon",
    },
]);
</script>

<template>
    <Head title="Contacts" />

    <AuthenticatedLayout>
        <nav class="px-3.5 py-2">
            <div class="flex justify-between max-w-7xl mt-1">
                <NavLink
                    :href="
                        route('profile.edit', $page.props.auth.user.username)
                    "
                    :active="route().current('profile.edit')"
                    class="tracking-wide text-gray-700 font-semibold"
                    ><ProfileImage />
                </NavLink>
                <NavLink
                    :href="route('logout')"
                    :active="route().current('logout')"
                    method="post"
                    as="button"
                    class="tracking-wide text-gray-700 font-semibold"
                    ><LogoutImage />
                </NavLink>
            </div>
        </nav>
        <div class="bg-gray-100 border-b border-gray-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="flex items-center justify-between mx-auto mb-2 mt-3"
                >
                    <h1 class="text-3xl font-semibold">Contacts</h1>
                    <NavLink
                        as="button"
                        class="text-3xl text-gray-900 font-bold"
                        >+
                    </NavLink>
                </div>
                <TextInput
                    id="search"
                    type="text"
                    class="block w-full mb-3.5"
                    required
                    autocomplete=""
                    placeholder="Search..."
                />
            </div>
        </div>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm text-gray-900">
                    <div
                        v-for="contact in contacts"
                        :key="contact.id"
                        class="even:bg-gray-200"
                    >
                        <Link>
                            <div
                                class="flex items-center justify-between mx-auto p-2.5 px-3"
                            >
                                <h1 class="text-lg p-1.5">
                                    {{ contact.name }}
                                </h1>
                                <Arrow />
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
