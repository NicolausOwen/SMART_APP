<script setup>
import { ref } from 'vue';
import logo from '@@/assets/Logo.png';


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

// State untuk mengatur menu toggle
const isMenuOpen = ref(false);
</script>

<template>
    <nav class="sticky bg-customOrange w-full z-20 top-0 start-0 b-customOrange">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo dan Judul -->
            <a class="flex items-center space-x-3 rtl:space-x-reverse">
                <img :src="logo" class="h-12" alt="Logo" />
                <span class="self-center text-4xl font-semibold whitespace-nowrap text-white">PPDB</span>
            </a>

            <!-- Tombol Login dan Burger Menu -->
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <Link v-if="!$page.props.auth.user && canLogin" :href="route('login')"
                    class="text-lg text-customOrange bg-white hover:bg-[#EC8305] hover:customOrange hover:text-white focus:ring-4 focus:outline-none focus:ring-white-300 font-medium rounded-lg px-4 py-2 text-center">
                Log in
                </Link>

                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="text-lg text-customOrange bg-white hover:bg-[#EC8305] hover:customOrange hover:text-white focus:ring-4 focus:outline-none focus:ring-white-300 font-medium rounded-lg px-4 py-2 text-center">
                Dashboard
                </Link>

                <!-- <button type="button"
                    class="text-lg text-customOrange bg-white hover:bg-[#EC8305] hover:customOrange hover:text-white focus:ring-4 focus:outline-none focus:ring-white-300 font-medium rounded-lg px-4 py-2 text-center">
                    Login
                </button> -->

                <!-- Burger Menu Button -->
                <button @click="isMenuOpen = !isMenuOpen" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                    aria-controls="navbar-sticky" :aria-expanded="isMenuOpen">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            <!-- Navbar Links -->
            <div :class="{ 'hidden': !isMenuOpen, 'flex': isMenuOpen }"
                class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-8 ml-auto font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-lg text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-white-700 md:p-0"
                            </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-lg text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-white-700 md:p-0">Alur</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-lg text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-white-700 md:p-0">Pendaftaran</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-lg text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-white-700 md:p-0">FAQ</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</template>

<style scoped>
/* Tambahkan styling jika diperlukan */
</style>
