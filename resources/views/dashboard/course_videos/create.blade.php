@extends('dashboard.layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full lg:max-w-1/2 px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white text-lg">Form Tambah Video</h6>
                    </div>
                    <div class="flex-auto md:max-w-full px-4 pt-4 pb-6">
                        <form action="{{ route('courses.add_video.save', $course->id) }}" method="POST"
                            enctype="multipart/form-data" class="w-full">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" id="name" name="name" autofocus value="{{ old('name') }}"
                                    class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            </div>

                            <div class="mb-4">
                                <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Video
                                    Path</label>
                                <input type="text" id="video_path" name="video_path" autofocus
                                    value="{{ old('video_path') }}"
                                    class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            </div>

                            <div class="flex justify-between">
                                <a href="{{ url()->previous() }}"
                                    class="items-center px-6 py-2 mt-6 text-sm flex justify-center text-center font-bold text-white bg-slate-700 rounded-lg hover:bg-slate-800"
                                    style="width: 130px; height: 45px;">
                                    Kembali
                                </a>
                                <button type="submit" style="background-color: #4f46e5;"
                                    class="items-center px-6 py-2 mt-6 text-sm flex justify-center text-center font-bold text-white rounded-lg"
                                    style="width: 130px; height: 45px;">
                                    Simpan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
