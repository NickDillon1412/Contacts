<script setup>
import LogoutImage from "./LogoutImage.vue";
import NavLink from "./NavLink.vue";
import ProfileImage from "./ProfileImage.vue";
const props = defineProps(["class"]);
</script>

<template>
    <nav :class="props.class" class="px-3.5 py-3 bg-slate-800 text-white">
        <div
            v-if="$page.props.auth.user"
            class="container flex flex-wrap items-center justify-between mx-auto max-w-7xl"
        >
            <NavLink
                :href="route('profile.edit', $page.props.auth.user.username)"
                :active="route().current('profile.edit')"
                as="button"
                class="tracking-wide text-gray-700 font-semibold flex items-center cursor-pointer"
                ><ProfileImage />
                <h1 class="text-white ml-1">
                    {{ $page.props.auth.user.name }}
                </h1>
            </NavLink>
            <NavLink
                :href="route('logout')"
                :active="route().current('logout')"
                method="post"
                as="button"
                class="cursor-pointer"
                ><LogoutImage />
            </NavLink>
        </div>

        <div
            v-if="!$page.props.auth.user"
            class="container flex flex-wrap items-center justify-end mx-auto max-w-7xl"
        >
            <div v-if="$page.props.initialComponent === Login">
                <NavLink
                    :href="route('register')"
                    :active="route().current('register')"
                    as="button"
                    class="tracking-wide cursor-pointer"
                    ><h1 class="text-white uppercase">Register</h1>
                </NavLink>
            </div>
        </div>
    </nav>
</template>
