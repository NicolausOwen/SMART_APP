<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { computed } from 'vue';
import { usePage, useForm } from '@inertiajs/vue3';
import html2pdf from 'html2pdf.js';

import logo from '@@/assets/picture/Logo.png';

// Fetch the authenticated user's information
const page = usePage();
const user = computed(() => page.props.auth.user);

// Define options for the layout
defineOptions({ layout: DashboardLayout });

// Define properties
const props = defineProps({
  id: Number,
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

// Initialize form
const form = useForm({
  guidebook: null,
});

// Handle file input
const handleFile = (event) => {
  if (event.target.files && event.target.files[0]) {
    form.guidebook = event.target.files[0];
  }
};

// Submit form
const submitForm = () => {
  form.post(route('panduan.upload'), {
    preserveScroll: true,
    onError: (errors) => console.error(errors),
  });
};

// Download PDF
const downloadPDF = () => {
  const element = document.getElementById("registration-details");
  const options = {
    margin: [10, 10, 10, 10],
    filename: "bukti-pendaftaran-siswa.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
  };

  html2pdf().set(options).from(element).save();
};

// Print PDF feature
const printPDF = () => {
  const element = document.getElementById("registration-details");
  const options = {
    margin: [10, 10, 10, 10],
    html2canvas: { scale: 2 },
  };

  html2pdf()
    .set(options)
    .from(element)
    .outputPdf()
    .then((pdf) => {
      const blobUrl = URL.createObjectURL(pdf);
      const iframe = document.createElement('iframe');
      iframe.style.display = 'none';
      iframe.src = blobUrl;
      document.body.appendChild(iframe);
      iframe.contentWindow.print();
      setTimeout(() => document.body.removeChild(iframe), 100);
    });
};
</script>

<template>
  <div class="mt-[6%] m-5">
    <!-- Registration Details Section -->
    <div id="registration-details"
      class="p-6 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <img :src="logo" style="float: left; height: 60px" alt="Logo" />
      <div style="margin-left: 20px">
        <div style="font-size: 18px">Data Pendaftaran Siswa Baru | Tahun 2024</div>
        <div style="font-size: 20px">SMA UNSRI</div>
        <div style="font-size: 12px">Palembang – Prabumulih No 1</div>
      </div>
      <hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;" />

      <h1 class="text-2xl font-bold">Bukti Pendaftaran Siswa</h1>
      <div class="pt-5">
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Id Pendaftaran</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ "BP202400" + id }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Nama Lengkap</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ name }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Tempat, Tanggal Lahir</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ birthplace }}, {{ birthdate }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Alamat</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ address }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Nomor Telepon</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ phone }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Email</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ email }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Nama Orang Tua</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ parent }}</p>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="text-gray-700 dark:text-gray-300 md:w-1/4"><strong>Pekerjaan Orang Tua</strong></p>
          <p class="text-gray-700 dark:text-gray-300 md:w-3/4">: {{ parentjob }}</p>
        </div>
      </div>
    </div>

    <!-- Buttons for PDF actions -->
    <div class="mt-4 flex gap-4">
      <button @click="downloadPDF" class="px-4 py-2 bg-blue-500 text-white rounded">Download PDF</button>
      <button @click="printPDF" class="px-4 py-2 bg-green-500 text-white rounded">Print PDF</button>
    </div>
  </div>
</template>

<style scoped>
/* Add any custom styles here if necessary */
</style>
