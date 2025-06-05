@extends('dashboard.layouts.app')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white" style="font-size: large;">Detail</h6>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 pt-4 pb-6">
                        <!-- KANAN: Foto Profil -->
                        <div class="flex justify-center md:justify-end items-start">
                            <div class="text-center">
                                <label class="block text-sm font-bold text-gray-700 dark:text-white mb-2">
                                    Foto Profil
                                </label>
                                <img src="{{ asset('storage/' . $mentor->user->avatar) }}" alt="Foto Profil"
                                    class="w-60 h-60 rounded-full object-cover shadow-lg">
                            </div>
                        </div>
                        <!-- KIRI: Data Mentor dalam 2 kolom -->
                        <div class="md:col-span-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kolom 1 (KIRI) -->
                                <div class="space-y-4 md:space-y-8">
                                    <!-- Nama -->
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Nama</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span
                                                class="text-base text-gray-700 dark:text-white">{{ $mentor->user->name }}</span>
                                        </div>
                                    </div>

                                    <!-- Pekerjaan -->
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Pekerjaan</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span
                                                class="text-base text-gray-700 dark:text-white">{{ $mentor->occupation }}</span>
                                        </div>
                                    </div>

                                    <!-- Bank -->
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Bank</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span
                                                class="text-base text-gray-700 dark:text-white">{{ $mentor->bank_name }}</span>
                                        </div>
                                    </div>

                                    <!-- CV -->
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">CV</label>
                                        <div class="p-3 hover:underline text-red-400">
                                            <a href="{{ Storage::url($mentor->cv_file) }}" target="_blank"
                                                class="text-blue-600 dark:text-blue-400 hover:underline">Lihat CV (PDF)</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom 2 (KANAN) -->
                                <div class="space-y-4 md:space-y-8">
                                    <!-- Email -->
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Email</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span class="text-base text-gray-700 dark:text-white">{{ $mentor->user->email }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Nomor Rekening -->
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Nomor
                                            Rekening</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span class="text-base text-gray-700 dark:text-white">
                                                {{ $mentor->bank_account_number }}</span>
                                        </div>
                                    </div>

                                    <!-- Nama Rekening -->
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Nama
                                            Rekening</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span class="text-base text-gray-700 dark:text-white">
                                                {{ $mentor->account_holder_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tombol Kembali -->
                        <a href="{{ route('mentors.index') }}"
                            class="items-center px-6 py-2 mt-6 text-xs flex justify-center text-center font-bold text-white bg-slate-700 rounded-lg hover:bg-slate-800"
                            style="width: 130px; height: 40px;">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
