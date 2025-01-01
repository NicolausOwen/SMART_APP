<script setup>
import { ref, onMounted } from 'vue';

import HomeLayout from "@/Layouts/HomeLayout.vue";

import siap from '@@/assets/picture/siapppdb.jpg';  // Gambar untuk card
import pesawat from '@@/assets/picture/pesawat.png';  // Gambar pesawat
import tabletImage from '@@/assets/picture/data.png'; // Gambar untuk mockup
import bingung from '@@/assets/picture/orang.svg'; // Gambar untuk orang


const currentSlide = ref(0);
const slides = [
    'assets/picture/sekolah.svg',
    'assets/picture/sekolah.svg',
    'assets/picture/sekolah.svg'
];

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.length;
};

const prevSlide = () => {
    currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length;
};

const goToSlide = (index) => {
    currentSlide.value = index;
};

onMounted(() => {
    if (slides.length > 0) {
        setInterval(nextSlide, 3000); // Pastikan ada slide yang tersedia
    }
});

defineOptions({ layout: HomeLayout });
</script>

<template>

    <Head title="HOME" />


    <div class="wrapper">
        <!-- Carousel -->
        <div class="relative w-full my-[-6%]" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden max-w-full xs:h-64 sm:h-72 md:h-[40rem]">
                <div v-for="(slide, index) in slides" :key="index"
                    :class="['absolute w-full h-full transition-opacity duration-700', currentSlide === index ? 'opacity-100' : 'opacity-0']">
                    <img :src="slide" class="block w-full h-full object-cover" alt="Slide image" />
                    <!-- Teks dan Tombol di Tengah -->
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black bg-opacity-50">
                        <h2 class="text-xl xs:text-xl sm:text-3xl md:text-5xl font-bold mb-4">Selamat Datang di Sekolah
                            Kami</h2>
                        <button
                            class="px-4 py-2 xs:px-6 xs:py-3 bg-customOrange text-white font-semibold rounded-full hover:bg-black">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-10 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
                <button v-for="(slide, index) in slides" :key="index" type="button"
                    :class="['w-3 h-3 rounded-full', currentSlide === index ? 'bg-white' : 'bg-gray-400']"
                    @click="goToSlide(index)" :aria-label="`Slide ${index + 1}`"></button>
            </div>
            <!-- Slider controls -->
            <button @click="prevSlide" class="absolute top-0 left-0 z-10 flex items-center justify-center h-full px-4">
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50">
                    <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button @click="nextSlide" class="absolute top-0 right-0 z-10 flex items-center justify-center h-full px-4">
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50">
                    <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- Siap PPDB?? -->
        <div class="mt-20 flex justify-center items-center min-h-screen space-x-10 flex-wrap gap-32">
            <!-- Card Container -->
            <div class="relative max-w-sm bg-white border border-customOrange rounded-lg shadow-lg">
                <!-- Card Image -->
                <a href="#">
                    <img class="rounded-t-lg w-full h-[300px] object-cover" :src="siap" alt="Siap PPDB" />
                </a>
                <!-- Card Content -->
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Siap PPDB</h5>
                    </a>
                    <p class="mb-3 font-sm text-md text-gray-700">
                        Selamat datang di Penerimaan Peserta Didik Baru (PPDB)! Kami mengundang calon siswa dan orang
                        tua untuk bergabung dengan sekolah kami. Dengan fasilitas terbaik dan tenaga pengajar
                        berpengalaman, kami berkomitmen untuk memberikan pendidikan yang unggul dan berkualitas.
                        Daftarkan segera untuk menjadi bagian dari komunitas belajar yang inspiratif dan dinamis.
                    </p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-customOrange rounded-lg hover:bg-black focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Daftar
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Pesawat Image (sebelah kanan card) -->
            <div class="relative w-[200px] md:w-[300px]">
                <img :src="pesawat" alt="Pesawat" class="object-contain w-full h-full" />
            </div>
        </div>


        <!-- LOREM IPSUMM???? -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-12 mt-8">
            <!-- Bagian kiri: Gambar dengan teks besar -->
            <div class="flex flex-col items-center justify-center w-[300px] md:w-[500px]">
                <h2 class="text-4xl font-semibold text-center text-gray-900 mb-6">
                    Apa saja sih yang diperlukan untuk mendaftar?
                </h2>
                <p class="text-md text-center text-black mb-8">
                    Ayo bergabung dengan sekolah kami! Untuk mendaftar, kamu hanya perlu menyiapkan informasi pribadi
                    seperti nama, alamat, dan data kontak lainnya. Jangan lupa juga untuk memberikan detail akun seperti
                    email dan password. Pastikan semua informasi yang kamu masukkan benar dan lengkap. Setelah itu,
                    konfirmasi untuk menyelesaikan proses pendaftaran. Yuk, daftarkan dirimu sekarang dan raih masa
                    depan gemilang bersama kami!
                </p>
                <!-- Gambar baru di bawah teks -->
                <img :src="bingung" class="w-full h-[250px] object-contain mb-4" alt="Informasi orang" />
            </div>
            <!-- Bagian kanan: Mockup tablet dengan gambar penuh -->
            <div
                class="relative border-gray-800  bg-gray-800 border-[14px] rounded-[2.5rem] max-w-[341px] md:max-w-[512px]">
                <div class="h-[32px] w-[3px] bg-gray-800  absolute -start-[17px] top-[72px] rounded-s-lg">
                </div>
                <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg">
                </div>
                <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg">
                </div>
                <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg">
                </div>
                <!-- Mockup image container -->
                <div class="rounded-[2rem] overflow-hidden bg-white relative w-full">
                    <!-- Menyesuaikan ukuran mockup dengan gambar di dalamnya -->
                    <img :src="tabletImage" class="object-contain w-full h-auto" alt="Tablet mockup image">
                </div>
            </div>
        </div>


        <!-- Langkah Pendaftaran -->
        <div class="flex flex-col items-center justify-center py-20">
            <h1 class="text-4xl font-semibold text-center mb-8">Informasi Langkah Pendaftaran</h1>
            <ol
                class="relative text-black border-s border-black w-full xs:max-w-xs sm:max-w-xs md:max-w-md lg:max-w-3xl">
                <li class="mb-10 ms-6 flex flex-col items-center">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 bg-customOrange rounded-full -start-4 ring-4 ring-white">
                        <svg class="w-3.5 h-3.5 text-white dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </span>
                    <h3 class="text-xl font-medium leading-tight">Personal Info</h3>
                    <p class="text-md text-center">Masukkan data seperti nama, alamat, dan informasi lainnya.</p>
                </li>
                <li class="mb-10 ms-6 flex flex-col items-center">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 bg-customOrange rounded-full -start-4 ring-4 ring-white">
                        <svg class="w-3.5 h-3.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                        </svg>
                    </span>
                    <h3 class="text-xl font-medium leading-tight">Account Info</h3>
                    <p class="text-md text-center">Detail akun seperti email dan password</p>
                </li>
                <li class="mb-10 ms-6 flex flex-col items-center">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 bg-customOrange rounded-full -start-4 ring-4 ring-white">
                        <svg class="w-3.5 h-3.5 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                        </svg>
                    </span>
                    <h3 class="text-xl font-medium leading-tight">Review</h3>
                    <p class="text-md text-center">Review data yang telah diisi sebelumnya.</p>
                </li>
                <li class="ms-6 flex flex-col items-center">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 bg-customOrange rounded-full -start-4 ring-4 ring-white">
                        <svg class="w-3.5 h-3.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                        </svg>
                    </span>
                    <h3 class="text-xl font-medium leading-tight">Confirmation</h3>
                    <p class="text-md text-center">Konfirmasi semua informasi yang telah dimasukkan</p>
                </li>
            </ol>
        </div>
    </div>

</template>