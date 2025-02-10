<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

import latar from '@@/assets/picture/sekolah.svg';
import logo from '@@/assets/picture/Logo.png';

import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

const props = defineProps({
  score: BigInt,
});

// Define form data using useForm
const form = useForm({
  quran: null, // Selected option value
  score: 0,
});

// Options for the selection
const options = [
  { value: "Sangat Fasih", label: "Sangat Fasih" },
  { value: "Fasih", label: "Fasih" },
  { value: "Cukup Fasih", label: "Cukup Fasih" },
  { value: "Kurang Fasih", label: "Kurang Fasih" },
  { value: "Tidak Bisa Baca", label: "Tidak Bisa Baca" },
];

watch(() => form.quran, (newVal) => {
  if (newVal === "Sangat Fasih") {
    form.score = 100;
  } else if (newVal === "Fasih") {
    form.score = 80;
  } else if (newVal === "Cukup Fasih") {
    form.score = 60;
  } else if (newVal === "Kurang Fasih") {
    form.score = 40;
  } else if (newVal === "Tidak Bisa Baca") {
    form.score = 20;
  }
});

// Submit handler
const submitChoice = () => {
  form.put('/pendaftaran/kefasihan-quran', {
    onSuccess: () => {
      // After successful create, refresh the page
      // window.location.reload();
      window.location.href = '/pendaftaran/kriteria-pendapatan';
    },
    onError: () => {
      console.log('Error creating user');
    }
  }); // Submit form data to the specified route
};

const goBack = () => {
  window.history.back();
};

defineOptions({ layout: DashboardLayout })
</script>

<template>
  <div class="min-h-screen bg-cover bg-center flex items-center justify-center px-4"
    :style="{ backgroundImage: `url(${latar})` }">
    <div class="login-box">
      <!-- Ikon PNG di atas tengah box -->
      <div class="text-center">
        <img :src="logo" alt="Logo" class="w-20 xs:w-16 sm:w-24 mx-auto mb-4">
        <h1 class="text-xl xs:text-lg sm:text-2xl font-semibold text-gray-900 mb-6">Form Pendaftaran</h1>
      </div>
      <!-- Judul kriteria penerimaan -->
      <h2 class="text-left font-bold text-xl mb-4">Kriteria Penerimaan</h2>
      <h3 class="text-left text-lg mb-4">
        Seberapa lancar kamu membaca al-Quran
      </h3>
      <!-- Opsi pilihan -->
      <form @submit.prevent="submitChoice">
        <div v-for="(option, index) in options" :key="index"
          class="flex items-center ps-4 border border-gray-200 rounded mb-2"
          :class="{ 'bg-orange-500 text-white': form.quran === option.value }">
          <input :id="'custom-radio-' + index" type="radio" :value="option.value" v-model="form.quran" class="hidden" />
          <label :for="'custom-radio-' + index" class="w-full py-4 ms-2 text-sm font-medium cursor-pointer">
            {{ option.label }}
          </label>
        </div>
        <h3>Score : {{ score }}</h3>
        <!-- Tombol Kembali dan Submit -->
        <div class="flex justify-end gap-4 mt-4">
          <button type="button" @click="goBack" class="py-2 px-4 text-white bg-gray-600 hover:bg-gray-700 rounded">
            Kembali
          </button>
          <button type="submit"
            class="submit-btn py-2 px-4 text-white bg-orange-600 hover:bg-orange-700 rounded disabled:bg-orange-400 disabled:cursor-not-allowed"
            :disabled="!form.quran">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
/* Gaya untuk box form */
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

/* Pusatkan teks judul */
.text-center {
  text-align: center;
}

/* Gaya untuk ikon */
.w-20 {
  width: 5rem;
}

.h-20 {
  height: 5rem;
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

/* Perubahan gaya saat dipilih */
.bg-orange-500 {
  background-color: #da8311;
}

.text-white {
  color: #ffffff;
}

/* Gaya tombol */
button {
  transition: background-color 0.3s ease;
}

button:disabled {
  background-color: #d1d5db;
  cursor: not-allowed;
}

.flex {
  display: flex;
}

.justify-end {
  justify-content: flex-end;
}

.gap-4 {
  gap: 16px;
}

.submit-btn {
  border: 2px solid #da8311;
  padding: 8px 16px;
  background-color: transparent;
  color: #da8311;
  font-weight: bold;
  transition: all 0.3s ease;
}

.submit-btn:hover {
  background-color: #da8311;
  color: white;
}

.submit-btn:disabled {
  border: 2px solid #d1d5db;
  color: #d1d5db;
}
</style>
