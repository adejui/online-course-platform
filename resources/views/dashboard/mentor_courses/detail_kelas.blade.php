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

                        <div class="flex justify-center md:justify-end items-start">
                            <div class="text-center">
                                <label class="block text-sm font-bold text-gray-700 dark:text-white mb-2">
                                    Thumbnail
                                </label>
                                <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail"
                                    class="w-60 h-60 rounded-lg object-cover shadow-lg">
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kolom 1 (KIRI) -->
                                <div class="space-y-4 md:space-y-8">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Nama
                                            Kelas</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span class="text-base text-gray-700 dark:text-white">{{ $course->name }}</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Tentang
                                            Kelas</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span
                                                class="text-base text-gray-700 dark:text-white">{{ $course->about }}</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Harga</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span
                                                class="text-base text-gray-700 dark:text-white">Rp{{ number_format($course->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom 2 (KANAN) -->
                                <div class="space-y-4 md:space-y-8">
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Kategori</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span
                                                class="text-base text-gray-700 dark:text-white">{{ $course->category->name }}
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Mentor</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span class="text-base text-gray-700 dark:text-white">
                                                {{ optional($course->mentor?->user)->name ?? 'Mentor Tidak Ditemukan' }}</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-bold text-gray-700 pl-2 dark:text-white">Dibuat</label>
                                        <div class="bg-gray-100 dark:bg-slate-700 p-3 rounded-2xl">
                                            <span class="text-base text-gray-700 dark:text-white">
                                                {{ \Carbon\Carbon::parse($course->created_at)->translatedFormat('l, j F Y H:i') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('mentor_courses.show', $course) }}"
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
