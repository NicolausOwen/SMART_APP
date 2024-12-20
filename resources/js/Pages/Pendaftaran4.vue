<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

import latar from '@@/assets/picture/sekolah.svg';
import logo from '@@/assets/picture/Logo.png';

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

const props = defineProps({
  score: BigInt,
});

// Initializing the form using useForm
const form = useForm({
  pendapatan: null, // To store the selected value
  score: 0,
});

// Options for family income
const options = [
  { value: ">= Rp4.000.000", label: ">= Rp4.000.000" },
  { value: "Rp3.000.000-Rp3.900.000", label: "Rp3.000.000-Rp3.900.000" },
  { value: "Rp2.000.000-Rp2.900.000", label: "Rp2.000.000-Rp2.900.000" },
  { value: "Rp1.900.000-Rp1.000.000", label: "Rp1.900.000-Rp1.000.000" },
  { value: "< Rp1.000.000", label: "< Rp1.000.000" },
];

watch(() => form.pendapatan, (newVal) => {
  if (newVal === ">= Rp4.000.000") {
    form.score = 100;
  } else if (newVal === "Rp3.000.000-Rp3.900.000") {
    form.score = 80;
  } else if (newVal === "Rp2.000.000-Rp2.900.000") {
    form.score = 60;
  } else if (newVal === "Rp1.900.000-Rp1.000.000") {
    form.score = 40;
  } else if (newVal === "< Rp1.000.000") {
    form.score = 20;
  }
});

// Submit the form
const submitChoice = () => {
  if (form.pendapatan) {
    form.put('/pendaftaran/kriteria-pendapatan', {
      onSuccess: () => {
        window.location.href = '/pendaftaran/prestasi';
      },
      onError: (errors) => {
        console.error(errors);
      },
    });
  }
};

const goBack = () => {
  window.history.back();
};

defineOptions({ layout: DashboardLayout })
</script>

<template>
  <form @submit.prevent="submitChoice">
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
        <h3 class="text-left text-lg mb-4">Pendapatan Keluarga</h3>
        <!-- Opsi pilihan -->
        <div v-for="(option, index) in options" :key="index"
          class="flex items-center ps-4 border border-gray-200 rounded mb-2"
          :class="{ 'bg-orange-500 text-white': form.pendapatan === option.value }">
          <input :id="'custom-radio-' + index" type="radio" :value="option.value" v-model="form.pendapatan"
            class="hidden" />
          <label :for="'custom-radio-' + index" class="w-full py-4 ms-2 text-sm font-medium cursor-pointer">
            {{ option.label }}
          </label>
        </div>
        <h3>Score : {{ score }}</h3>
        <!-- Tombol Kembali dan Submit -->
        <div class="flex justify-end gap-4 mt-4">
          <button @click="goBack" class="py-2 px-4 text-white bg-gray-600 hover:bg-gray-700 rounded">
            Kembali
          </button>
          <button @click="submitChoice"
            class="submit-btn py-2 px-4 text-white bg-orange-600 hover:bg-orange-700 rounded disabled:bg-orange-400 disabled:cursor-not-allowed"
            :disabled="!form.pendapatan">
            Submit
          </button>
        </div>
      </div>
    </div>
  </form>
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
  /* Ukuran lebar ikon */
}

.h-20 {
  height: 5rem;
  /* Ukuran tinggi ikon */
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

/* Perubahan gaya saat dipilih */
.bg-orange-500 {
  background-color: #da8311;
  /* Warna oranye */
}

.text-white {
  color: #ffffff;
  /* Warna teks putih */
}

/* Gaya tombol */
button {
  transition: background-color 0.3s ease;
}

/* Gaya untuk tombol ketika disabled */
button:disabled {
  background-color: #d1d5db;
  /* Warna abu-abu */
  cursor: not-allowed;
}

/* Flexbox untuk tombol */
.flex {
  display: flex;
}

.justify-end {
  justify-content: flex-end;
  /* Menempatkan tombol di sisi kanan */
}

.gap-4 {
  gap: 16px;
  /* Jarak antara tombol */
}

/* Gaya tombol Submit yang lebih pipih dan dengan border */
.submit-btn {
  border: 2px solid #da8311;
  /* Border oranye */
  padding: 8px 16px;
  /* Padding lebih kecil */
  background-color: transparent;
  /* Menghilangkan latar belakang */
  color: #da8311;
  /* Warna teks oranye */
  font-weight: bold;
  transition: all 0.3s ease;
  /* Efek transisi */
}

.submit-btn:hover {
  background-color: #da8311;
  /* Background oranye saat hover */
  color: white;
  /* Warna teks putih saat hover */
}

.submit-btn:disabled {
  border: 2px solid #d1d5db;
  /* Warna border abu-abu saat disabled */
  color: #d1d5db;
  /* Warna teks abu-abu saat disabled */
}
</style>
``
