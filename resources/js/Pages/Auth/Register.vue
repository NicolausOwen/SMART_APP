<script setup>

import Background from '@/Components/Backround.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};


const password = ref('');
const confirmPassword = ref('');
const errorMessage = ref('');
const isSubmitted = ref(false);

const validatePasswords = () => {
    if (isSubmitted.value) {
        if (password.value !== confirmPassword.value) {
            errorMessage.value = 'Password tidak sama';
        } else {
            errorMessage.value = '';
        }
    }
};

const handleSubmit = () => {
    isSubmitted.value = true;
    validatePasswords();
};

onMounted(() => {
    document.documentElement.classList.add('overflow-hidden');
});

onUnmounted(() => {
    document.documentElement.classList.remove('overflow-hidden');
});

</script>

<template>
    <Background />

    <Head title="Register" />

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">
        <div
            class="w-full max-w-md sm:max-w-lg md:max-w-xl p-8 bg-white border-4 border-[#EC8305] rounded-2xl shadow sm:p-10 md:p-12">
            <form class="space-y-6" @submit.prevent="submit">

                <div>
                    <label for="nama"
                        class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-black">Username</label>
                    <input type="text" name="nama" id="nama" v-model="form.name"
                        class="border border-[#EC8305] text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-white dark:border-[#EC8305] dark:placeholder-gray-400 dark:text-black"
                        placeholder="nama" required />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <label for="email"
                        class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-black">Email</label>
                    <input type="email" name="email" id="email" v-model="form.email"
                        class="border border-[#EC8305] text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-white dark:border-[#EC8305] dark:placeholder-gray-400 dark:text-black"
                        placeholder="email@google.com" required />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <label for="password"
                        class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-black">Password</label>
                    <input type="password" id="password" v-model="form.password" @input="validatePasswords"
                        placeholder="••••••••"
                        class="border text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-white border-[#EC8305] dark:placeholder-gray-400 dark:text-black"
                        required />
                </div>

                <div>
                    <label for="confirm-password"
                        class="block mb-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-black">Confirm
                        Password</label>
                    <input type="password" id="confirm-password" v-model="form.password_confirmation"
                        @input="validatePasswords" placeholder="••••••••"
                        :class="['border', 'text-gray-900', 'text-xs', 'sm:text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2', 'bg-white', 'border-[#EC8305]', errorMessage ? 'border-red-500' : '']"
                        required />
                    <p v-if="isSubmitted && errorMessage" class="text-red-500 text-xs mt-1">{{ errorMessage }}</p>
                </div>

                <button type="submit"
                    class="w-full text-white bg-[#EC8305] hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-xs sm:text-sm px-5 py-2 text-center disabled:bg-gray-400 disabled:cursor-not-allowed">
                    Registrasi Akun
                </button>

                <div class="text-xs font-medium text-gray-500 dark:text-gray-500 text-center">
                    Sudah punya akun? <a :href="route('login')"
                        class="text-blue-700 hover:underline dark:text-blue-500">Masuk</a>
                </div>
            </form>
        </div>
    </div>
</template>
