<script setup>
import Arrow from "@/Components/Arrow.vue";
import BlankUser from "@/Components/BlankUser.vue";
import NavLink from "@/Components/NavLink.vue";
import Plus from "@/Components/Plus.vue";
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
        .filter((contact) => contact.name)
        .map((contact) => contact.name[0]);

    return filteredInitials;
});
</script>

<template>
    <Head title="Contacts" />

    <div class="min-h-screen pt-6">
        <div class="mx-auto sm:px-6 lg:px-5 border-b">
            <div
                class="flex items-center justify-between text-center mx-auto mb-2"
            >
                <h1 class="text-3xl text-slate-800 font-semibold">Contacts</h1>
                <NavLink
                    as="button"
                    class="font-bold flex justify-center items-center rounded-full bg-slate-700 hover:bg-red-400 shadow-sm py-1.5 px-1.5"
                    ><Plus />
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

        <div class="mx-auto">
            <div class="bg-white overflow-hidden text-slate-800">
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
                                <BlankUser class="ml-1.5">{{
                                    contactInitial[i]
                                }}</BlankUser>
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
