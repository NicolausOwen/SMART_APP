<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

import latar from '@@/assets/picture/sekolah.svg';
import logo from '@@/assets/picture/Logo.png';

import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  id: { type: Number, default: null },
  user_id: Number,
  jenisPrestasi: { type: String, default: null },
  namaPrestasi: { type: String, default: null },
  tingkatPrestasi: { type: String, default: null },
  penyelenggara: { type: String, default: null },
  sertifikat: { type: String, default: null },
});

// Form initialization with useForm
const form = useForm({
  jenisPrestasi: props.jenisPrestasi || '',
  namaPrestasi: props.namaPrestasi || '',
  tingkatPrestasi: props.tingkatPrestasi || '',
  penyelenggara: props.penyelenggara || '',
  sertifikat: props.sertifikat || '',
});

// Submit the form

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
  form.post('/pendaftaran/prestasi', {
    onSuccess: () => {
      window.location.href = '/dashboard';
    },
    onError: (errors) => {
      console.error(errors);
    },
  });
};


const updateForm = () => {
  form.put('/pendaftaran/prestasi', {
    onSuccess: () => {
      // After successful create, refresh the page
      // window.location.reload();
      window.location.href = '/dashboard';
    },
    onError: () => {
      console.log('Error creating user');
    }
  });
};

const goBack = () => {
  window.history.back();
};

defineOptions({ layout: DashboardLayout })
</script>

<template>
  <div class="min-h-screen bg-cover bg-center flex items-center justify-center px-4"
    :style="{ backgroundImage: `url(${latar})` }">
    <!-- Framer -->
    <div class="login-box">

      <div class="text-center">
        <!-- Logo -->
        <div class="text-center">
          <img :src="logo" alt="Logo" class="w-20 xs:w-16 sm:w-24 mx-auto mb-4">
          <h1 class="text-xl xs:text-lg sm:text-2xl font-semibold text-gray-900 mb-6">Form Pendaftaran</h1>
        </div>


        <div class="grid grid-cols-2 gap-4">
          <!-- Judul -->
          <div>
            <h2 class="text-left font-bold text-xl mb-4">Kriteria Penerimaan</h2>
            <p class="text-left text-lg mb-4">Prestasi Akademik dan Non-Akademik</p>
          </div>

          <!-- Jenis Prestasi -->
          <div class="w-full sm:w-56 sm:ml-auto">
            <label for="jenis-prestasi" class="block mb-2 text-sm font-medium text-black">Jenis Prestasi</label>
            <h1>Selected {{ form.jenisPrestasi }} </h1>
            <select id="jenis-prestasi" v-model="form.jenisPrestasi"
              class="w-full h-10 border border-orange-400 text-gray-700 text-sm rounded bg-white appearance-none focus:ring-orange-500 focus:border-orange-500 p-2.5 hover:border-orange-500 hover:bg-orange-50">
              <option value="" disabled selected>Pilih Jenis Prestasi</option>
              <option value="akademik">Akademik</option>
              <option value="non-akademik">Non-Akademik</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Konten Formulir -->
      <form class="space-y-4 sm:space-y-6" :class="{ 'opacity-50 pointer-events-none': !form.jenisPrestasi }">
        <!-- Nama Prestasi -->
        <div>
          <label for="nama-prestasi" class="block mb-2 text-sm font-medium text-gray-700">Nama Prestasi</label>
          <input autocomplete="on" id="nama-prestasi" type="text" v-model="form.namaPrestasi" placeholder="Masukkan Nama Prestasi yang Diikuti"
            class="w-full border border-orange-400 text-gray-700 text-sm rounded focus:ring-orange-500 focus:border-orange-500 p-2.5"
            :disabled="!form.jenisPrestasi" />
        </div>

        <!-- Tingkat Prestasi -->
        <div>
          <label for="tingkat-prestasi" class="block mb-2 text-sm font-medium text-gray-700">Tingkat Prestasi</label>
          <select autocomplete="on" id="tingkat-prestasi" v-model="form.tingkatPrestasi"
            class="w-full h-10 border border-orange-400 text-gray-700 text-sm rounded bg-white appearance-none focus:ring-orange-500 focus:border-orange-500 p-2.5"
            :disabled="!form.jenisPrestasi">
            <option value="" disabled selected>-</option>
            <option>Internasional</option>
            <option>Nasional</option>
            <option>Provinsi</option>
            <option>Kabupaten/Kota</option>
            <option>Kecamatan</option>
          </select>
        </div>

        <!-- Penyelenggara -->
        <div>
          <label for="penyelenggara" class="block mb-2 text-sm font-medium text-gray-700">Penyelenggara</label>
          <input autocomplete="on" id="penyelenggara" type="text" v-model="form.penyelenggara" placeholder="Masukkan Nama Penyelenggara"
            class="w-full border border-orange-400 text-gray-700 text-sm rounded focus:ring-orange-500 focus:border-orange-500 p-2.5"
            :disabled="!form.jenisPrestasi" />
        </div>

        <!-- Sertifikat Prestasi -->
        <div>
          <label for="sertifikat" class="block mb-2 text-sm font-medium text-gray-700">Sertifikat Prestasi</label>
          <input id="sertifikat" type="file" @change="form.sertifikat = $event.target.files[0]" accept=".pdf,.png,.jpeg,.jpg"
            class="w-full border border-orange-400 text-gray-700 text-sm rounded focus:ring-orange-500 focus:border-orange-500 p-2.5 bg-white cursor-pointer"
            :disabled="!form.jenisPrestasi" />
          <a class="block mt-2 text-xs font-normal text-gray-500">Upload File dalam Bentuk PDF, PNG, JPEG/JPG</a>
        </div>
      </form>

      <!-- Tombol Navigasi -->
      <div class="flex justify-end gap-4 mt-4">
        <button @click="goBack" type="button" class="py-2 px-4 text-white bg-gray-600 hover:bg-gray-700 rounded">
          Kembali
        </button>
        <button type="submit"
          class="submit-btn py-2 px-4 text-white bg-orange-600 hover:bg-orange-700 rounded disabled:bg-orange-400 disabled:cursor-not-allowed"
          @click="submitForm">
          Simpan dan Lanjutkan
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.login-box {
  width: 100%;
  max-width: 800px;
  min-height: 500px;
  margin: 70px auto 15px auto;
  padding: 40px 70px;
  border: 1px solid #ddd;
  border-radius: 50px;
  border-color: #da8311;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
