<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Link, usePage, useForm } from '@inertiajs/vue3';
import { computed, ref, onMounted } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);


defineOptions({ layout: DashboardLayout })

const props = defineProps({
    user_id: Number,
    name: String,
    birthplace: String,
    birthdate: String,
    address: String,
    phone: String,
    email: String,
    parent: String,
    parentjob: String,
    quran: String,
    pendapatan: String,
    jenisPrestasi: String,
    namaPrestasi: String,
    tingkatPrestasi: String,
    penyelenggara: String,
    sertifikat: String,
    guidebook: String,
});

const form = useForm({
    guidebook: null,
});

const handleFile = (event) => {
    form.guidebook = event.target.files[0];
};

const submitForm = () => {
    form.post(route('panduan.upload'), {
        preserveScroll: true,
    });
};

</script>

<template>

    <Head title="Dashboard" />

    <div v-if="user.role === 'admin'" :href="route('admin')"
        class="p-4 border-2 border-white border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-1 gap-4">
            <div class="flex items-center justify-center h-24 rounded bg-gray-100 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <a :href="route('admin')"
                        class="flex items-center p-2 text-gray-700 rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Admin</span>
                    </a>
                </p>
            </div>
            <!-- <div class="flex items-center justify-center h-24 rounded bg-gray-100 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div> -->



            <div class="grid grid-cols-1 gap-4">
                <div class="flex flex-col items-center justify-center h-96 rounded bg-gray-100 dark:bg-gray-800 p-4">
                    <label class="text-lg font-semibold mb-4">Panduan Sekarang:</label>

                    <!-- Tampilkan panduan saat ini -->
                    <div v-if="props.guidebook === null" class="mb-4 text-gray-500">Panduan saat ini tidak tersedia.
                    </div>
                    <div v-else class="lg:ml-[57%] mb-4 w-full">
                        <a :href="guidebook" class="mt-2 text-blue-500 underline" download>Download Panduan
                            Saat Ini</a>
                    </div>

                    <form @submit.prevent="submitForm" enctype="multipart/form-data">
                        <div class="input-group mt-4 w-full">
                            <label for="panduan" class="block text-sm font-medium text-gray-700">Ganti Panduan
                                baru:</label>
                            <input type="file" ref="guidebook" id="panduan" @change="handleFile"
                                class="mt-2 p-2 border rounded w-full">
                            <button type="submit" class="mt-2 p-2 bg-blue-500 text-white rounded">Upload
                                Panduan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="p-2 border-2 border-white border-dashed rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-3 gap-4">
            <div class="flex items-center justify-center h-24 rounded bg-green-500 dark:bg-gray-800">
                <Link :href="route('pendaftaran')" class="text-2xl text-white dark:text-gray-500">
                Biodata Pendaftaran
                </Link>
            </div>
            <div class="flex items-center justify-center h-24 rounded bg-blue-500 dark:bg-gray-800">
                <Link :href="route('cetak')" class="text-2xl text-white dark:text-gray-500">
                Cetak Bukti
                </Link>
            </div>
            <!-- <div class="flex items-center justify-center h-24 rounded bg-indigo-500 dark:bg-gray-800">
                <Link href="#" class="text-2xl text-white dark:text-gray-500">
                Rekap Nilai
                </Link>
            </div> -->
            <div class="flex items-center justify-center h-24 rounded bg-teal-500 dark:bg-gray-800">
                <a :href="guidebook" download class="text-2xl text-white dark:text-gray-500">
                    Download Panduan
                </a>
            </div>
        </div>
    </div>

    <div class="mx-5 my-5 grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card 1 -->
        <div v-if="name"
            class="p-6 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="mx-5 my-5 grid grid-cols-1 md:grid-cols-1 gap-2">
                <div>
                    <h1 class="text-2xl font-bold">Biodata Siswa</h1>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Nama Lengkap</strong></p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ name }}</p>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Tempat, Tanggal Lahir</strong>
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ birthplace }}, {{ birthdate }}</p>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Alamat</strong></p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ address }}</p>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Nomor Telepon</strong></p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ phone }}</p>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Email</strong></p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ email }}</p>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Nama Orang Tua</strong></p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ parent }}</p>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex flex-col md:flex-row">
                            <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Pekerjaan Orang Tua</strong>
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ parentjob }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <Link :href="route('ubahbio')">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 
                dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-5">
                Ubah Biodata
            </button>
            </Link>
        </div>

        <!-- Card 2 -->
        <div v-if="quran"
            class="p-6 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-2xl font-bold">Data Pendaftaran</h1>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Kefasihan Membaca Al-Quran</strong></p>
                    <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ quran }}</p>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Pendapatan</strong></p>
                    <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ pendapatan }}</p>
                </div>
            </div>
            <h1 class="pt-8 text-2xl font-bold">Data Prestasi</h1>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Jenis Prestasi</strong></p>
                    <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ jenisPrestasi }}</p>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Nama Prestasi</strong></p>
                    <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ namaPrestasi }}</p>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Tingkat Prestasi</strong></p>
                    <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ tingkatPrestasi }}</p>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Penyelenggara</strong></p>
                    <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ penyelenggara }}</p>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex flex-col md:flex-row">
                    <p class="text-gray-700 dark:text-gray-300 md:w-1/3"><strong>Sertifikat</strong></p>
                    <div class="md:w-3/4">
                        <img :src="sertifikat" alt="Sertifikat Image" class="w-full h-auto" />
                    </div>
                </div>
            </div>
        </div>
    </div>









</template>
