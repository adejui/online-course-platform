@extends('dashboard.layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3 justify-center">
            <div class="flex-none w-full max-w-full px-3 sm:max-w-1/2">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white text-lg">Form Edit Kelas</h6>
                    </div>
                    <div class="w-full px-4 pt-4 pb-6">
                        <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data"
                            class="w-full">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- KIRI -->
                                <div>
                                    <div class="mb-4">
                                        <label for="thumbnail"
                                            class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>
                                        <div class="mb-4 flex justify-start">
                                            <img id="photoPreview"
                                                src="{{ $course->thumbnail ? Storage::url($course->thumbnail) : '#' }}"
                                                alt="Preview Foto"
                                                class="w-52 h-52 rounded-lg object-cover {{ $course->thumbnail ? '' : 'hidden' }} border" />
                                        </div>
                                        <input type="file" id="thumbnail" name="thumbnail" onchange="previewPhoto()"
                                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                        <input type="text" id="name" name="name" autofocus
                                            value="{{ old('name', $course->name) }}"
                                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="about" class="block text-sm font-medium text-gray-700 mb-1">Tentang
                                            Kelas</label>
                                        <textarea id="about" name="about" cols="30" rows="9" autofocus
                                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('about', $course->about) }}</textarea>
                                    </div>
                                </div>

                                <!-- KANAN -->
                                <div class="md:mt-4">
                                    <div class="mb-4">
                                        <label for="category_id"
                                            class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                        <select name="category_id" id="cetagory_id"
                                            class="w-full px-3 py-3.5 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $course->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="trailer_path"
                                            class="block text-sm font-medium text-gray-700 mb-1">Trailer Path</label>
                                        <input type="text" id="trailer_path" name="trailer_path" autofocus
                                            value="{{ old('trailer_path', $course->trailer_path) }}"
                                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="price"
                                            class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                        <input type="number" id="price" name="price" autofocus
                                            value="{{ old('price', $course->price) }}"
                                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mt-6">
                                <a href="{{ route('courses.show', $course) }}"
                                    class="items-center px-6 py-2 text-sm flex justify-center text-center font-bold text-white bg-slate-700 rounded-lg hover:bg-slate-800"
                                    style="width: 130px; height: 45px;">
                                    Kembali
                                </a>
                                <button type="submit" style="background-color: #4f46e5;"
                                    class="items-center px-6 py-2 text-sm flex justify-center text-center font-bold text-white rounded-lg"
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

<script>
    function previewPhoto() {
        const input = document.getElementById('thumbnail');
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
