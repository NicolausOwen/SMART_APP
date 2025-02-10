<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import { watch, ref, onMounted } from "vue";
import axios from "axios";
import InputError from "@/Components/InputError.vue";

let sections = ref({});
const student = usePage().props.student;

const form = useForm({
    name: student.data.name || "",
    email: student.data.email || "",
    birthplace: student.data.birthplace || "",
    birthdate: student.data.birthdate || "",
    address: student.data.address || "",
    phone: student.data.phone || "",
    parent: student.data.parent || "",
    parentjob: student.data.parentjob || "",
    tes_iq: student.data.tes_iq || "",
    tes_masuk: student.data.tes_masuk || "",
    score_quran: student.data.score_quran || "",
    score_pendapatan: student.data.score_pendapatan || "",
    score_prestasi: student.data.score_prestasi || "",
    status: student.data.status || "Belum Diterima",
});

const submit = () => {
    form.put(route("students.update", student.data.id), {
        preserveScroll: true,
    });
};
</script>

<template>

    <Head title="Edit Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Student
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">


                <!-- CONTENT KANAN -->
                <div class="lg:col-span-4 space-y-6 sm:px-6 lg:px-0">

                    <div class="bg-white p-6 shadow-lg rounded-lg">
                        <div class="container mx-auto p-4">
                            <div class="flex flex-col gap-4">


                                <div class="flex-1">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full bg-white border border-gray-200">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Kriteria
                                                    </th>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Bobot
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Baca Alquran
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        40%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Prestasi Akademik dan Non-Akademik
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        30%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Nilai Tes Masuk Sekolah
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        15%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Tes IQ
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        10%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Pendapatan Keluarga
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        5%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="flex flex-col space-y-4">
                                    <!-- Baca Al-Qur'an -->
                                    <div class="overflow-x-auto bg-white border border-gray-200 p-2">
                                        <table class="min-w-full">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Kriteria Baca Al-Qur'an</th>
                                                </tr>
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Nilai</th>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Sangat Fasih</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        100</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Fasih</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        80</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Cukup Fasih</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        60</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Kurang Fasih</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        40</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Tidak Bisa Baca</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Prestasi Akademik dan Non-Akademik -->
                                    <div class="overflow-x-auto bg-white border border-gray-200 p-2">
                                        <table class="min-w-full">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Kriteria Prestasi Akademik dan Non-Akademik</th>
                                                </tr>
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Nilai</th>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Internasional</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        100</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Nasional</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        80</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Provinsi</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        60</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Kabupaten</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        40</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Kecamatan</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Nilai Tes Masuk Sekolah -->
                                    <div class="overflow-x-auto bg-white border border-gray-200 p-2">
                                        <table class="min-w-full">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="px-4 py-2 border-b border-gray-200 bg-gray-50
                                text-left
                                text-sm font-medium text-gray-600">
                                                        Nilai Tes Masuk Sekolah</th>
                                                </tr>
                                                <tr>
                                                    <th class="px-4 py-2 border-b border-gray-200 bg-gray-50
                                text-left
                                text-sm font-medium text-gray-600">
                                                        Nilai</th>
                                                    <th class="px-4 py-2 border-b border-gray-200 bg-gray-50
                                text-left
                                text-sm font-medium text-gray-600">
                                                        Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        86-100</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        100</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        71-85</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        80</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        56-70</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        60</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        41-55</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        40</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        41 </td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Tes IQ -->
                                    <div class="overflow-x-auto bg-white border border-gray-200 p-2">
                                        <table class="min-w-full">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="px-4 py-2 border-b border-gray-200 bg-gray-50
                                text-left
                                text-sm font-medium text-gray-600">
                                                        Tes IQ</th>
                                                </tr>
                                                <tr>
                                                    <th class="px-4 py-2 border-b border-gray-200 bg-gray-50
                                text-left
                                text-sm font-medium text-gray-600">
                                                        Nilai</th>
                                                    <th class="px-4 py-2 border-b border-gray-200 bg-gray-50
                                text-left
                                text-sm font-medium text-gray-600">
                                                        Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        >=110</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        100</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        91-110</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        80</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        71-90</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        60</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        51-70</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        40</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        50</td>
                                                    <td class="px-4 py-2 border-b border-gray-200 text-sm
                                text-gray-700">
                                                        20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pendapatan Keluarga -->
                                    <div class="overflow-x-auto bg-white border border-gray-200 p-2">
                                        <table class="min-w-full">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Pendapatan Keluarga</th>
                                                </tr>
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Nilai</th>
                                                    <th
                                                        class="px-4 py-2 border-b border-gray-200 bg-gray-50 text-left text-sm font-medium text-gray-600">
                                                        Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        >= Rp4.000.000</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        100</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Rp3.000.000-Rp3.900.000</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        80</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Rp2.000.000-Rp2.900.000</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        60</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        Rp1.900.000-Rp1.000.000</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        40</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        < Rp1.000.000</td>
                                                    <td
                                                        class="px-4 py-2 border-b border-gray-200 text-sm text-gray-700">
                                                        20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- CONTENT KIRI -->
                <div class="lg:col-span-8 space-y-6 sm:px-6 lg:px-0">
                    <form @submit.prevent="submit">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Student Information
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Use this form to update student information.
                                    </p>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Name -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input v-model="form.name" type="text" id="name"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.name,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>

                                    <!-- Email -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email
                                            Address</label>
                                        <input v-model="form.email" type="email" id="email" autocomplete="email"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.email,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.email" />
                                    </div>

                                    <!-- Birthplace -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="birthplace"
                                            class="block text-sm font-medium text-gray-700">Birthplace</label>
                                        <input v-model="form.birthplace" type="text" id="birthplace"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.birthplace,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.birthplace" />
                                    </div>

                                    <!-- Address -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="address"
                                            class="block text-sm font-medium text-gray-700">Address</label>
                                        <input v-model="form.address" type="text" id="address"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.address,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.address" />
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input v-model="form.phone" type="text" id="phone"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.phone,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.phone" />
                                    </div>

                                    <!-- Parent -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="parent" class="block text-sm font-medium text-gray-700">Parent
                                            Name</label>
                                        <input v-model="form.parent" type="text" id="parent"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.parent,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.parent" />
                                    </div>

                                    <!-- Parent Job -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="parentjob" class="block text-sm font-medium text-gray-700">Parent
                                            Job</label>
                                        <input v-model="form.parentjob" type="text" id="parentjob"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.parentjob,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.parentjob" />
                                    </div>

                                    <!-- Birthdate -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="birthdate"
                                            class="block text-sm font-medium text-gray-700">Birthdate</label>
                                        <input v-model="form.birthdate" type="date" id="birthdate"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.birthdate,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.birthdate" />
                                    </div>

                                    <!-- Tes IQ -->
                                    <div class="col-span-5 sm:col-span-1">
                                        <label for="tes_iq" class="block text-sm font-medium text-gray-700">Tes
                                            IQ</label>
                                        <input v-model="form.tes_iq" type="number" id="tes_iq"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.tes_iq,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.tes_iq" />
                                    </div>
                                    <!-- Tes Masuk -->
                                    <div class="col-span-5 sm:col-span-1">
                                        <label for="tes_masuk" class="block text-sm font-medium text-gray-700">Tes
                                            Masuk</label>
                                        <input v-model="form.tes_masuk" type="number" id="tes_masuk"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.tes_masuk,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.tes_masuk" />
                                    </div>

                                    <!-- Score Quran -->
                                    <div class="col-span-5 sm:col-span-1">
                                        <label for="score_quran" class="block text-sm font-medium text-gray-700">Score
                                            Quran</label>
                                        <input v-model="form.score_quran" type="number" id="score_quran"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.score_quran,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.score_quran" />
                                    </div>

                                    <!-- Score Prestasi -->
                                    <div class="col-span-5 sm:col-span-1">
                                        <label for="score_prestasi"
                                            class="block text-sm font-medium text-gray-700">Score
                                            Prestasi</label>
                                        <input v-model="form.score_prestasi" type="number" id="score_prestasi"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.score_prestasi,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.score_prestasi" />
                                    </div>

                                    <!-- Score Pendapatan -->
                                    <div class="col-span-5 sm:col-span-1">
                                        <label for="score_pendapatan" class="block text-sm font-medium text-gray-700">
                                            Score Pendapatan</label>
                                        <input v-model="form.score_pendapatan" type="number" id="score_pendapatan"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.score_pendapatan,
                                            }" />
                                        <InputError class="mt-2" :message="form.errors.score_pendapatan" />
                                    </div>

                                    <div class="col-span-5 sm:col-span-1">
                                        <label for="status" class="block text-sm font-medium text-gray-700">
                                            Status
                                        </label>
                                        <select v-model="form.status" id="status"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.status,
                                            }">
                                            <option value="Belum diterima">Belum diterima</option>
                                            <option value="lulus">lulus</option>
                                            <option value="gagal">gagal</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.status" />
                                    </div>
                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <Link :href="route('students.index')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                                Cancel
                                </Link>
                                <button type="submit"
                                    class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
