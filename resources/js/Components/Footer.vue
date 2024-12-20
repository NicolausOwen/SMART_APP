<script setup>
import alamat from '@@/assets/alamat.svg'
import email from '@@/assets/mail-03.svg'
import hp from '@@/assets/phone.svg'

</script>

<template>
    <footer class="bg-cover bg-center w-full bg-customOrange"
        style="background-image: url(/assets/picture/sekolah.svg);">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-16 px-4 py-32 lg:py-16 md:grid-cols-4">
                <!-- Konten Footer Utama -->
                <div>
                    <h2 class="mb-12 font-semibold text-white uppercase xs:text-sm sm:text-sm md:text-sm lg:text-3xl">
                        Kontak Kami
                    </h2>
                    <ul class="text-white font-medium space-y-4">
                        <!-- Link ke WhatsApp atau Telepon -->
                        <li>
                            <a href="tel:+628971769857" class="flex items-center hover:underline">
                                <img :src="hp" alt="icon telepon" class="w-5 h-5 mr-2" />
                                <span>08971769857</span>
                            </a>
                        </li>
                        <!-- Link ke Email -->
                        <li>
                            <a href="mailto:bakududiikan@gmail.com" class="flex items-center hover:underline">
                                <img :src="email" alt="icon email" class="w-5 h-5 mr-2" />
                                <span>Email@gmail.com</span>
                            </a>
                        </li>
                        <!-- Link ke Google Maps -->
                        <li>
                            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Masjid+Al+Gazali,+Bukit+Lama,+Kec.+Ilir+Bar.+I,+Kota+Palembang,+Sumatera+Selatan+30128"
                                target="_blank" class="flex items-center hover:underline">
                                <img :src="alamat" alt="icon alamat" class="w-5 h-5 mr-2" />
                                <span>Jl. Masjid Al Gazali, Bukit Lama, Kec. Ilir Bar. I, Kota Palembang, Sumatera
                                    Selatan 30128</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-12 font-semibold text-white uppercase xs:text-sm sm:text-sm md:text-sm lg:text-3xl">
                        Help center
                    </h2>
                    <ul class="text-white font-medium">
                        <li class="mb-4"><a href="#" class="hover:underline">Discord Server</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Twitter</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Facebook</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Kolom-kolom Lainnya -->
            </div>
        </div>
    </footer>

    <!-- Footer Paling Bawah -->
    <footer class="w-full bg-customOrange px-4 py-4">
        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-between">
            <span class="text-sm text-white sm:text-center">
                © 2023 <a href="#">PPDB™</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
                <a href="#" class="text-white hover:text-gray-900 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                            d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-white hover:text-gray-900 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 21 16">
                        <path
                            d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                    </svg>
                    <span class="sr-only">Discord community</span>
                </a>
                <a href="#" class="text-white hover:text-gray-900 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 17">
                        <path fill-rule="evenodd"
                            d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-white hover:text-gray-900 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.519 1.021c1.053 1.707 2.882 1.215 3.591.93.111-.762.41-1.215.745-1.493-2.67-.302-5.469-1.335-5.469-5.926 0-1.306.462-2.373 1.225-3.207-.122-.302-.532-.927-.084-1.915 0 0 1.051-.367 3.449 1.342 1.003-.278 2.08-.418 3.125-.424 1.045.006 2.122.146 3.125.424 2.398-1.71 3.448-1.342 3.448-1.342-.448.988-.038 1.613-.084 1.915.764.834 1.225 1.901 1.225 3.207 0 4.592-2.8 5.623-5.476 5.926.42.372.749.998.749 1.997 0 1.44-.01 2.599-.01 2.946 0 .264.177.576.687.477A9.914 9.914 0 0 0 10 .333Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
            </div>
        </div>
    </footer>
</template>
