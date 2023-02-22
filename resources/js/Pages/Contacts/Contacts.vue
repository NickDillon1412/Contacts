<script setup>
import Arrow from "@/Components/Arrow.vue";
import BlankUser from "@/Components/BlankUser.vue";
import NavLink from "@/Components/NavLink.vue";
import TextInput from "@/Components/TextInput.vue";
import { PlusIcon } from "@heroicons/vue/24/outline";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import debounce from "lodash/debounce";
import { computed, ref, watch } from "vue";

const props = defineProps({
    contacts: Object,
    filters: Object,
});

const search = ref(props.filters.search);

watch(
    search,
    debounce((value) => {
        Inertia.get(
            "/contacts/contacts-list",
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 300)
);

const contactInitial = computed(() => {
    const filteredInitials = props.contacts
        .filter((contact) => contact.name)
        .map((contact) => contact.name[0]);

    return filteredInitials;
});
</script>

<template>
    <Head title="Contacts" />

    <div class="pt-6">
        <div class="mx-auto px-5 border-b">
            <div
                class="flex items-center justify-between text-center mx-auto mb-2"
            >
                <h1 class="text-3xl text-slate-800 font-semibold">Contacts</h1>
                <NavLink
                    :href="route('contact.create')"
                    as="button"
                    class="font-bold flex justify-center items-center rounded-full border-2 border-red-400 bg-red-400 hover:bg-gray-100 hover:border-2 hover:border-red-400 shadow-sm p-0.5"
                    ><PlusIcon
                        class="w-5 h-5 text-white hover:text-red-400 font-semibold transition ease-in-out duration-150"
                    />
                </NavLink>
            </div>
            <TextInput
                id="search"
                type="text"
                class="block w-full mb-6"
                autocomplete=""
                placeholder="Search..."
                v-model="search"
            />
        </div>

        <div class="mx-auto">
            <div class="bg-white overflow-hidden text-slate-800">
                <div
                    v-for="(contact, i) in contacts.data"
                    :key="contact.id"
                    class="even:bg-gray-100 border-b border-gray-200 hover:bg-gray-300"
                >
                    <Link :href="route('contact.edit', contact)">
                        <div
                            class="flex items-center justify-between mx-auto p-2.5 px-3"
                        >
                            <div class="flex justify-center space-x-1 ml-0.5">
                                <BlankUser
                                    v-if="!contact.image"
                                    class="mb-2.5 w-20 h-20 text-2xl"
                                    >{{ contactInitial[i] }}</BlankUser
                                >
                                <img
                                    v-else
                                    :src="contact.image"
                                    class="w-10 max-h-10 rounded-full"
                                    alt="Contact Image"
                                />
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
