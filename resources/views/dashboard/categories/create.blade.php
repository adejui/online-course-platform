@extends('dashboard.layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full lg:max-w-1/2 px-3 sm:max-w-full">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white text-lg">Form Tambah Kategori</h6>
                    </div>
                    <div class="flex-auto md:max-w-full px-4 pt-4 pb-6">
                        <div class="p-0 overflow-x-auto">
                            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                                class="w-full">
                                @csrf

                                <!-- Preview Foto -->
                                <div class="mb-4">
                                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Ikon</label>
                                    <div class="mb-4 flex justify-start">
                                        <img id="photoPreview" src="#" alt="Preview Foto"
                                            class="w-40 h-40 rounded-lg object-cover hidden border" />
                                    </div>
                                    <input type="file" id="icon" name="icon" onchange="previewPhoto()"
                                        class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                    @error('icon')
                                        <p class="text-sm text-red-500 mb-0 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nama -->
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                    <input type="text" id="name" name="name" autofocus
                                        value="{{ old('name') }}"
                                        class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                    @error('name')
                                        <p class="text-sm text-red-500 mb-0 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tombol -->
                                <div class="flex justify-between">
                                    <a href="{{ route('categories.index') }}"
                                        class="items-center px-6 py-2 mt-6 text-sm flex justify-center text-center font-bold text-white bg-slate-700 rounded-lg hover:bg-slate-800"
                                        style="width: 130px; height: 45px;">
                                        Kembali
                                    </a>
                                    <button type="submit" style="background-color: #3B82F6;"
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
    </div>
@endsection

<script>
    function previewPhoto() {
        const input = document.getElementById('icon');
        const preview = document.getElementById('photoPreview');

        const file = input.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(file);
        }
    }
</script>
