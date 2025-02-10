<script setup>

import DashboardLayout from '@/Layouts/DashboardLayout.vue';

import latar from '@@/assets/picture/sekolah.svg';
import logo from '@@/assets/picture/Logo.png';

import { onMounted } from 'vue';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import { useForm } from '@inertiajs/vue3';

onMounted(() => {
  flatpickr("#default-datepicker", {
    enableTime: false,       // Nonaktifkan waktu
    dateFormat: "d-m-Y",     // Format tanggal
    defaultDate: "today",    // Tanggal default
    altInput: true,          // Input alternatif
    altFormat: "F j, Y",     // Format alternatif
  });
});

const props = defineProps({
  user_id: Number,
  id: { type: Number, default: null },

  name: String,
  birthplace: String,
  birthdate: String,
  address: String,
  phone: String,
  email: String,
  parent: String,
  parentjob: String,
})

const form = useForm({
  name: props.name || '',
  birthplace: props.birthplace || '',
  birthdate: props.birthdate || '',
  address: props.address || '',
  phone: props.phone || '',
  email: props.email || '',
  parent: props.parent || '',
  parentjob: props.parentjob || '',
  user_id: props.user_id,
})

// Define placeholders
const placeholders = {
  name: props.name || 'Nama',
  birthplace: props.birthplace || 'Tempat Lahir',
  birthdate: props.birthdate || 'Tanggal Lahir',
  address: props.address || 'Alamat',
  phone: props.phone || 'Telepon',
  email: props.email || 'Email',
  parent: props.parent || 'Orang Tua',
  parentjob: props.parentjob || 'Pekerjaan Orang Tua',
};

const handleSubmit = () => {
  if (props.id !== null) {
    // If user data exists, update the record
    updateForm();
  } else {
    // If no user data, create a new record
    submitForm();
  }
};

const submitForm = () => {
  form.post('/pendaftaran', {
    onSuccess: () => {
      // After successful create, refresh the page
      // window.location.reload();
      window.location.href = '/pendaftaran/kefasihan-quran';
    },
    onError: () => {
      console.log('Error creating user');
    }
  });
};

const updateForm = () => {
  form.put('/pendaftaran', {
    onSuccess: () => {
      // After successful create, refresh the page
      // window.location.reload();
      window.location.href = '/pendaftaran/kefasihan-quran';
    },
    onError: () => {
      console.log('Error creating user');
    }
  });
};


defineOptions({ layout: DashboardLayout })

</script>


<template>

  <Head title="Biodata" />

  <div class="min-h-screen bg-cover bg-center flex items-center justify-center px-4"
    :style="{ backgroundImage: `url('${latar}')` }">
    <!-- Box putih -->
    <div
      class="OrangeBorder bg-white shadow-lg rounded-[35px] mt-16 mb-5 p-8 w-full xs:max-w-[320px] sm:max-w-[420px] md:max-w-[620px] lg:max-w-[900px]">

      <!-- Form framer -->
      <div class="max-w-[600px] mx-auto">
        <!-- Logo dan Judul -->
        <div class="text-center">
          <img :src="logo" alt="Logo" class="w-20 xs:w-16 sm:w-24 mx-auto mb-4">
          <h1 class="text-xl xs:text-lg sm:text-2xl font-semibold text-gray-900 mb-6">Ubah Biodata</h1>
        </div>
        <br><br>

        <!-- Form -->
        <form class="space-y-4" @submit.prevent="handleSubmit">

          <!-- Nama Lengkap -->
          <div class="grid grid-cols-3 items-center">
            <label for="nama-lengkap" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">Nama
              Lengkap</label>
            <input v-model="form.name" type="text" id="nama-lengkap" placeholder="Nama" :placeholder="placeholders.name"
              class="col-span-2 block w-full p-2 text-gray-900 border border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          </div>

          <!-- Tempat/Tanggal Lahir & Kota -->
          <div class="grid grid-cols-3 items-center gap-4">
            <label for="tanggal-lahir" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">
              Tempat/Tanggal Lahir
            </label>
            <div class="col-span-2 grid grid-cols-2 gap-4">
              <!-- Kota -->
              <input id="kota" type="text" placeholder="Kota"
                class="block w-full p-2 text-gray-900 border border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                v-model="form.birthplace" />

              <!-- Tanggal Lahir -->
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input id="default-datepicker" type="text"
                  class="bg-gray-50 border border-customOrange rounded-lg text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                  placeholder="MM/DD/YYYY" v-model="form.birthdate">
              </div>
            </div>
          </div>


          <!-- Alamat -->
          <div class="grid grid-cols-3 items-center">
            <label for="alamat" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
            <input v-model="form.address" type="text" id="alamat" placeholder="Alamat"
              class="col-span-2 block w-full p-2 text-gray-900 bordecr border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          </div>

          <!-- Nomor Telepon -->
          <div class="grid grid-cols-3 items-center">
            <label for="nomor-telepon" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">Nomor
              Telepon</label>
            <input v-model="form.phone" type="text" id="nomor-telepon" placeholder="No Telepon"
              class="col-span-2 block w-full p-2 text-gray-900 border border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          </div>

          <!-- Email -->
          <div class="grid grid-cols-3 items-center">
            <label for="email" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input v-model="form.email" type="email" id="email" placeholder="name@gmail.com"
              class="col-span-2 block w-full p-2 text-gray-900 border border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          </div>

          <!-- Nama Orang Tua/Wali -->
          <div class="grid grid-cols-3 items-center">
            <label for="nama-wali" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">Nama Orang
              Tua/Wali</label>
            <input v-model="form.parent" type="text" id="nama-wali" placeholder="Nama Orang tua/Wali"
              class="col-span-2 block w-full p-2 text-gray-900 border border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          </div>

          <!-- Pekerjaan Orang Tua/Wali -->
          <div class="grid grid-cols-3 items-center">
            <label for="pekerjaan-wali" class="col-span-1 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan
              Orang Tua/Wali</label>
            <input v-model="form.parentjob" type="text" id="pekerjaan-wali" placeholder="Pekerjaan"
              class="col-span-2 block w-full p-2 text-gray-900 border border-customOrange rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit"
              class="text-white bg-customOrange hover:bg-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Ubah
            </button>
            <br><br><br>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
.OrangeBorder {
  border: 1px solid #ddd;
  border-radius: 50px;
  border-color: #da8311;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
