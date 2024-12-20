<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Background from '@/Components/Backround.vue';

defineOptions({ layout: DashboardLayout })
</script>


<template>
    <Background />

    <Head title="Jadwal Tes dan Hasil" />

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">
        <div
            class="w-full max-w-md sm:max-w-lg md:max-w-xl p-8 bg-white border-4 border-[#EC8305] rounded-2xl shadow sm:p-10 md:p-12">
            <div class="space-y-8">
                <!-- Jadwal Tes dan Pengumuman Hasil -->
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 text-center">Jadwal Tes dan Pengumuman Hasil PPDB</h1>
                </div>

                <!-- Tabel Jadwal -->
                <div>
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 p-2 text-gray-900 text-md">Kegiatan</th>
                                <th class="border border-gray-300 p-2 text-gray-900 text-md">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">Pendaftaran Online</td>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">1 Januari 2024 - 15 Januari
                                    2024</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">Seleksi Administrasi</td>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">16 Januari 2024 - 20
                                    Januari 2024</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">Pelaksanaan Tes Tulis</td>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">25 Januari 2024</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">Pengumuman Hasil Tes</td>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">30 Januari 2024</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">Daftar Ulang</td>
                                <td class="border border-gray-300 p-2 text-gray-900 text-md">1 Februari 2024 - 5
                                    Februari 2024</td>
                            </tr>
                        </tbody>
                    </table>
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
        </div>
    </div>
</template>
