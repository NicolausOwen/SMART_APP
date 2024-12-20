<script setup>
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import Pagination from '@/Components/Pagination.vue';
import { router, usePage, useForm } from '@inertiajs/vue3';
import { ref, watch, computed } from "vue";

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineOptions({ layout: AuthenticatedLayout });

defineProps({

    students: {
        type: Object,
        required: true,
    },
});

let pageNumber = ref(1),
    searchTerm = ref(usePage().props.search ?? ""),
    class_id = ref(usePage().props.class_id ?? "");

const pageNumberUpdated = (link) => {
    pageNumber.value = link.url.split("=")[1];
};

const deleteForm = useForm({});

const deleteStudent = (id) => {
    if (confirm("Are you sure you want to delete this student?")) {
        deleteForm.delete(route("students.destroy", id), {
            preserveScroll: true,
        });
    }
};

let studentsUrl = computed(() => {
    const url = new URL(route("students.index"));

    url.searchParams.set("page", pageNumber.value);

    if (searchTerm.value) {
        url.searchParams.set("search", searchTerm.value);
    }

    if (class_id.value) {
        url.searchParams.append("class_id", class_id.value);
    }

    return url;
});

watch(
    () => studentsUrl.value,
    (newValue) => {
        router.visit(newValue, {
            replace: true,
            preserveState: true,
            preserveScroll: true,
        });
    }
);

watch(
    () => searchTerm.value,
    (value) => {
        if (value) {
            pageNumber.value = 1;
        }
    }
);


</script>

<template>

    <Head title="Admin Dashboard" />

    <div class="bg-gray-100 py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">
                            Students
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            A list of all the Students.
                        </p>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <Link :href="route('students.create')" class=" inline-flex items-center justify-center rounded-md border border-transparent
                            bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700
                            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Add Student
                        </Link>
                    </div>
                </div>

                <div class="flex flex-col justify-between sm:flex-row mt-6">
                    <div class="relative text-sm text-gray-800 col-span-3">
                        <div
                            class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                            <MagnifyingGlass />
                        </div>

                        <input type="text" v-model="searchTerm" placeholder="Search students data..." id="search"
                            class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg relative">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                ID
                                            </th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Name

                                            </th>
                                            <th scope="col"
                                                class="py-3.5 pl-1 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-2">
                                                Email

                                            </th>
                                            <th scope="col"
                                                class="px-3 py-4 text-center text-sm font-semibold text-gray-900">
                                                Score_akhir

                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                Kriteria

                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                Status

                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Created At
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6" />
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr v-for="student in students.data" :key="student.id">
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ student.id }}
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ student.name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ student.email }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                {{ student.score_akhir }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                {{ student.kriteria }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                {{ student.status }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ student.created_at }}
                                            </td>

                                            <td
                                                class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <!-- <Link :href="route(
                                                    'admin',
                                                    student.id
                                                )
                                                    " class="mr-2 text-indigo-600 hover:text-indigo-900">
                                                Verify
                                                </Link> -->
                                                <Link :href="route(
                                                    'students.edit',
                                                    student.id
                                                )
                                                    " class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                                </Link>
                                                <button @click="
                                                    deleteStudent(
                                                        student.id
                                                    )
                                                    " class="ml-2 text-indigo-600 hover:text-indigo-900">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <!-- Pagination Links -->
                                <Pagination :data="students" :pageNumberUpdated="pageNumberUpdated" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>