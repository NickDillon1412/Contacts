<script setup>
import Arrow from "@/Components/Arrow.vue";
import BlankUser from "@/Components/BlankUser.vue";
import NavLink from "@/Components/NavLink.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { computed, reactive } from "vue";

const contactList = reactive({
    contacts: [
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
    ],
});

const contactInitial = computed(() => {
    const filteredInitials = contactList.contacts
        .filter((e) => e.name)
        .map((e) => e.name[0]);

    return filteredInitials;
});
</script>

<template>
    <Head title="Contacts" />

    <div class="bg-gray-100 border-b border-gray-300 pt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="flex items-center justify-between text-center mx-auto mb-2"
            >
                <h1 class="text-3xl font-semibold">Contacts</h1>
                <NavLink
                    as="button"
                    class="font-bold uppercase rounded-md bg-slate-700 border-2 border-slate-700 hover:border-2 hover:border-slate-700 hover:bg-gray-100 text-white hover:text-slate-700 shadow-sm py-1 px-1.5"
                    >New
                </NavLink>
            </div>
            <TextInput
                id="search"
                type="text"
                class="block w-full mb-6"
                autocomplete=""
                placeholder="Search..."
            />
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm text-gray-900">
                <div
                    v-for="(contact, i) in contactList.contacts"
                    :key="contact.id"
                    class="even:bg-gray-100 border-b border-gray-200 hover:bg-gray-300"
                >
                    <Link>
                        <div
                            class="flex items-center justify-between mx-auto p-2.5 px-3"
                        >
                            <div class="flex justify-center space-x-1 ml-0.5">
                                <BlankUser>{{ contactInitial[i] }}</BlankUser>
                                <h1 class="text-lg p-1.5 py-2">
                                    {{ contact.name }}
                                </h1>
                            </div>
                            <Arrow />
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
