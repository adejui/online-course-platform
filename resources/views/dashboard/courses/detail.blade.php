@extends('dashboard.layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3 justify-center">
            <div class="flex-none w-full max-w-full px-3 sm:max-w-1/2">
                <div
                    class="relative px-6 flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="py-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white text-lg">Detail Kelas</h6>
                    </div>
                    @if (session('success'))
                        <div
                            class="mt-3 w-full mb-4 rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 text-white align-middle text-center px-4 py-3 text-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="w-full px-4 pt-4 pb-6 space-y-6">
                        <!-- Course  -->
                        <div
                            class="bg-white rounded-lg shadow p-6 flex flex-col md:flex-row lg:flex-row items-start md:items-center justify-between">
                            <div class="flex items-start gap-4">
                                <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail"
                                    class="w-36 h-24 object-cover rounded-lg" />
                                <div>
                                    <h3 class="text-xl font-semibold">{{ $course->name }}</h3>
                                    <p class="text-sm text-gray-500 mb-2">{{ $course->category->name }}</p>
                                </div>
                            </div>

                            <div class="flex gap-2 mt-4 md:mt-4">
                                <a href="{{ route('courses.edit', $course) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold px-5 py-2 rounded-lg">Edit
                                    Kelas</a>
                                <form action="#" method="POST">
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-5 py-2 rounded-full">Delete</button>
                                </form>
                            </div>
                        </div>

                        <div class="w-full h-0.5 bg-gray-200"></div>

                        <!-- Course Videos  -->
                        <div class="bg-white lg:mx-40 rounded-lg shadow p-6 space-y-4">

                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold">Video Materi</h4>
                                    <p class="text-sm text-gray-500">{{ $course->courseVideos->count() }} Total Video</p>
                                </div>

                                <a href="#"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2 rounded-lg">Tambah
                                    Video</a>
                            </div>

                            <!-- Video Item -->
                            <div class="md:flex md:justify-between items-center">
                                <div class="flex items-center gap-4">
                                    <img src="https://img.youtube.com/vi/YOUTUBE_ID/hqdefault.jpg" alt="Video Thumbnail"
                                        class="w-20 h-14 object-cover rounded-md" />
                                    <div>
                                        <h5 class="text-base font-medium">pertemuan 1</h5>
                                        <p class="text-sm text-gray-500">Lorem ipsumb s</p>
                                    </div>
                                </div>

                                <div class="flex md:flex gap-2">
                                    <a href="#"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold my-2 px-4 py-2 rounded-lg">Edit
                                    </a>
                                    <form action="#" method="POST">
                                        <button type="submit" style="background-color: #EF4444;"
                                            class="bg-red-600 hover:bg-red-800 text-white text-sm px-4 py-2 my-2 rounded-lg">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <a href="{{ route('courses.index') }}"
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
