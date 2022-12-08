<script setup>
import NavLink from "./NavLink.vue";
import ProfileImage from "./ProfileImage.vue";
const props = defineProps(["class"]);
</script>

<template>
    <nav :class="props.class" class="px-4 py-3 bg-slate-700 text-white">
        <div
            v-if="$page.props.auth.user"
            class="container flex flex-wrap items-center justify-between mx-auto max-w-7xl"
        >
            <div
                v-show="route().current('contacts.list')"
                class="flex items-center"
            >
                <NavLink
                    :href="
                        route('profile.edit', $page.props.auth.user.username)
                    "
                    :active="route().current('profile.edit')"
                    as="button"
                    class="tracking-wide text-gray-700 font-semibold"
                    ><ProfileImage class="px-0.5" />
                    <h1
                        class="text-white ml-1 border-b-2 border-slate-700 hover:border-red-400 px-0.5 py-1"
                    >
                        {{ $page.props.auth.user.name }}
                    </h1>
                </NavLink>
            </div>
            <NavLink
                :href="route('logout')"
                :active="route().current('logout')"
                method="post"
                as="button"
                class="text-slate-50 tracking-wide border-b-2 border-slate-700 hover:border-red-400 px-1 py-1"
                >Logout
            </NavLink>
        </div>

        <div
            v-if="!$page.props.auth.user"
            class="flex justify-end mx-auto max-w-7xl"
        >
            <div v-show="$page.url === '/' || $page.url === '/login'">
                <NavLink
                    :href="route('register')"
                    :active="route().current('login')"
                    as="button"
                    class="tracking-wide cursor-pointer"
                    ><h1 class="text-white uppercase">Register</h1>
                </NavLink>
            </div>

            <div v-show="$page.url === '/register'">
                <NavLink
                    :href="route('login')"
                    :active="route().current('register')"
                    as="button"
                    class="tracking-wide cursor-pointer"
                    ><h1 class="text-white uppercase">Login</h1>
                </NavLink>
            </div>
        </div>
    </nav>
</template>
