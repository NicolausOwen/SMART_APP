<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Background from '@/Components/Backround.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

// const status = ref('lulus');



const { props } = usePage();
const status = ref(props.status);
const name = ref(props.name);

defineOptions({ layout: DashboardLayout })
</script>

<template>
    <Background />

    <Head title="Pengumuman" />

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">
        <div
            class="w-full max-w-md sm:max-w-lg md:max-w-xl p-8 bg-white border-4 border-[#EC8305] rounded-2xl shadow sm:p-10 md:p-12">
            <div class="space-y-8">
                <!-- Pengumuman Kelulusan -->
                <div v-if="status === 'lulus'">
                    <h1 class="text-2xl font-bold text-gray-900 text-center">Selamat {{ name }} anda<span
                            class="bg-green-400 text-white rounded-md ml-1 px-2">LULUS</span> seleksi</h1>

                    <!-- Pembayaran -->
                    <div>
                        <p class="text-gray-900 text-md text-center">Pembayaran dapat dilakukan melalui rekening
                            berikut:
                        </p>
                        <ul class="text-gray-900 text-md space-y-1 text-center">
                            <li>Bank: Bank ABC</li>
                            <li>No. Rekening: 1234567890</li>
                            <li>Atas Nama: PPDB Sekolah XYZ</li>
                        </ul>
                    </div>

                    <!-- Kontak Admin -->
                    <div>
                        <p class="text-gray-900 text-md text-center">Untuk informasi lebih lanjut, hubungi admin:</p>
                        <ul class="text-gray-900 text-md space-y-1 text-center">
                            <li>Admin 1: +62 812 3456 7890</li>
                            <li>Admin 2: +62 811 2345 6789</li>
                        </ul>
                    </div>
                </div>
                <div v-else-if="status === 'gagal'">
                    <h1 class="text-2xl font-bold text-gray-900 text-center">Jangan Putus asa {{ name }} Anda<span
                            class="bg-red-400 text-white rounded-md px-2">GAGAL</span> seleksi</h1>
                </div>
                <div v-else>
                    <h1 class="text-2xl font-bold text-gray-900 text-center"><span
                            class="bg-red-400 text-white rounded-md px-2">{{ status }}</span><br> Silahkan Daftar Dulu
                        Yaa
                    </h1>
                </div>

            </div>
        </div>
    </div>

</template>