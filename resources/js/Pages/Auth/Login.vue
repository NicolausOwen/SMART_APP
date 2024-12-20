<script setup>

import Background from '@/Components/Backround.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted, onUnmounted } from 'vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
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

    <Head title="Log in" />

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">
        <div
            class="w-full max-w-md sm:max-w-lg md:max-w-xl p-8 bg-white border-4 border-[#EC8305] rounded-2xl shadow sm:p-10 md:p-12">
            <form @submit.prevent="submit" class="space-y-8" action="#">
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                    <input type="email" name="email" id="email" v-model="form.email"
                        class="border border-[#EC8305] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white"
                        placeholder="email@google.com" required />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" v-model="form.password"
                        class="border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white border-[#EC8305]"
                        required />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" :checked="form.remember"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 ">Ingat
                            saya</label>
                    </div>
                </div>
                <button type="submit" :disabled="form.processing"
                    class="w-full text-white bg-[#EC8305] hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login
                    ke akun</button>
                <div class="text-sm font-medium text-gray-500  text-center">
                    Tidak Punya Akun? <a :href="route('register')" class="text-blue-700 hover:underline ">Buat akun</a>
                </div>
                <a :href="route('password.request')"
                    class="ms-auto text-sm text-blue-700 hover:underline  text-center">Lupa
                    Password?</a>
            </form>
        </div>
    </div>
</template>
