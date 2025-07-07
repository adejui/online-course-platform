@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center gap-[30px]">
        {{-- <div class="w-fit flex items-center gap-3 p-2 pr-6 rounded-full bg-[#FFFFFF1F] border border-[#3477FF24]">
            <div class="w-[100px] h-[48px] flex shrink-0">
                <img src="{{ asset('assets/icon/avatar-group.png') }}" class="object-contain" alt="icon">
            </div>
            <p class="font-semibold text-sm text-white">Join 3 million users</p>
        </div> --}}
        <div class="flex flex-col gap-[10px]">
            <h1 class="font-semibold text-[70px] leading-[82px] pb-6 text-center gradient-text-hero">Wujudkan Karier
                Impianmu
            </h1>
            <p class="text-center text-xl leading-[36px] text-[#F5F8FA] pb-10">Ikuti kelas online berkualitas untuk kuasai
                skill
                baru dan <br>
                siapkan portofolio yang memukau.</p>
        </div>
        <div class="flex gap-6 w-fit">
            <a href=""
                class="text-white font-semibold rounded-[20px] p-[16px_32px] bg-indigo-600 hover:bg-indigo-700 transition-all duration-300 hover:shadow-md hover:shadow-indigo-500/70">Jelajahi
                Kelas</a>
            <a href=""
                class="text-white font-semibold rounded-[20px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#4F46E5]">Panduan
                Karier</a>
        </div>
    </div>
    {{-- <div class="flex gap-[70px] items-center justify-center">
        <div>
            <img src="{{ asset('assets/icon/logo-55.svg') }}" alt="icon">
        </div>
        <div>
            <img src="{{ asset('assets/icon/logo.svg') }}" alt="icon">
        </div>
        <div>
            <img src="{{ asset('assets/icon/logo-54.svg') }}" alt="icon">
        </div>
        <div>
            <img src="{{ asset('assets/icon/logo.svg') }}" alt="icon">
        </div>
        <div>
            <img src="{{ asset('assets/icon/logo-52.svg') }}" alt="icon">
        </div>
    </div> --}}
    </div>
    <section id="category-section" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Kategori Terpopuler</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Jelajahi Kelas</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Tingkatkan keahlian yang sedang tren dan raih peluang
                    karier.</p>
            </div>
        </div>
        @foreach (collect($categories)->chunk(4) as $chunk)
            <div class="grid grid-cols-{{ count($chunk) }} gap-[30px] mb-6">
                @foreach ($chunk as $category)
                    <a href="{{ route('front.category', $category) }}"
                        class="card flex items-center px-4 py-1 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#4F46E5] transition-all duration-300">
                        <div class="w-[80px] h-[80px] flex shrink-0">
                            <img src="{{ Storage::url($category->icon) }}" class="object-contain" alt="icon">
                        </div>
                        <p class="font-bold text-lg">{{ $category->name }}</p>
                    </a>
                @endforeach
            </div>
        @endforeach

    </section>
    <section id="Popular-Courses"
        class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#ebedf0] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Popular Courses</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Jangan Lewatkan, Belajar Sekarang!</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Saatnya upgrade skill biar siap dapetin karier impian
                    dengan gaji tinggi!</p>
            </div>
        </div>
        <div class="relative">
            @if ($courses->count() > 4)
                <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
                    <img src="{{ asset('assets/icon/icons8-chevron-24.png') }}" alt="icon">
                </button>
                <button class="btn-next absolute -right-[52px] top-[216px]">
                    <img src="{{ asset('assets/icon/icons8-chevron-24.png') }}" alt="icon">
                </button>
            @endif
            <div id="course-slider" class="w-full">
                @forelse ($courses as $course)
                    <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                        <div
                            class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[10px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#4F46E5]">
                            <a href="{{ route('front.details', $course) }}"
                                class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                                <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </a>
                            <div class="flex flex-col px-4">
                                <p class="flex justify-end text-sm text-end text-gray-500">
                                    {{ $course->category->name }}</p>
                                <a href="{{ route('front.details', $course) }}"
                                    class="mt-2 font-semibold text-lg line-clamp-2 hover:line-clamp-none">{{ $course->name }}</a>
                                <p class="flex text-md text-gray-500">
                                    Rp{{ number_format($course->price, 0, ',', '.') }}</p>
                                {{-- <div class="flex justify-between items-center mt-3">
                                    <div class="flex items-center gap-[2px]">
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                    </div>
                                    <p class="text-right text-[#6D7786]">{{ $course->coursePurchases->count() }}
                                        Pelajar</p>
                                </div> --}}
                                <div class="flex items-center gap-2 mt-6">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ Storage::url($course->mentor->user->avatar) }}"
                                            class="w-full h-full object-cover" alt="icon">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-semibold">{{ $course->mentor->user->name }}</p>
                                        <p class="text-[#6D7786]">{{ $course->mentor->occupation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center items-center w-full h-[200px]">
                        <p class="text-center text-xl font-semibold text-gray-700">
                            Belum ada daftar kelas
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section id="Pricing" class="max-w-[1200px] mx-auto flex justify-between items-center p-[70px_100px]">
        <div class="relative">
            <div class="w-[355px] h-[488px]">
                <img src="{{ asset('assets/background/benefit_illustration.png') }}" alt="icon">
            </div>
            <div
                class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[214px] bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
                <p class="font-semibold">Materi Pembelajaran</p>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="{{ asset('assets/icon/icons8-video-playlist-64.png') }}" class="w-9 h-9" alt="icon">
                    </div>
                    <p class="font-medium">Video Pembelajaran</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="{{ asset('assets/icon/icons8-3d-cube-48.png') }}" class="w-8 h-8" alt="icon">
                    </div>
                    <p class="font-medium">Forum Diskusi</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="{{ asset('assets/icon/icons8-book-50.png') }}" class="w-8 h-8" alt="icon">
                    </div>
                    <p class="font-medium">Dokumentasi</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-left gap-[30px]">
            <h2 class="font-bold text-[36px] leading-[52px]">Belajar dari Mana Saja, <br>Kapan Saja</h2>
            <p class="text-[#475466] text-lg leading-[34px]">Kembangkan skill baru dengan lebih fleksibel tanpa
                batasan.<br></p>
            <a href=""
                class="text-white font-semibold rounded-[20px] p-[16px_32px] bg-indigo-600 hover:bg-indigo-700 transition-all duration-300 w-fit hover:shadow-md hover:shadow-indigo-500/70">Daftar
                Kelas</a>
        </div>
    </section>
    <section id="Zero-to-Success"
        class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            {{-- <div
                class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Sukses Dimulai dari Langkah Pertama</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Pelajar Bahagia & Sukses</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Kuasai skill baru dan raih karier bergaji tinggi kini
                    jadi lebih mudah.</p>
            </div>
        </div>
        <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
            <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA] to-[#F5F8FA00]">
            </div>
            <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-[#F5F8FA]">
            </div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div
                    class="testi-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna1</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">`
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna2</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna3</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna4</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="logo-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna5</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna6</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna7</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna8</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div
                    class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna9</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna10</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna11</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna12</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna13</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna14</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">15</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna16</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icon/star.png') }}" class="w-3.5 h-3.5" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                {{-- <div
                    class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                    <div>
                        <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
                    </div>
                    <p class="font-medium text-sm text-[#FF6129]">Grow Your Career</p>
                </div> --}}
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Get Your Answers</h2>
                    <p class="text-lg text-[#475466]">It’s time to upgrade skills without limits!</p>
                </div>
            </div>
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#EEF2FF] has-[.hide]:bg-transparent border-t-4 border-[#4F46E5] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Bagaimana cara menerbitkan semua sertifikat
                            kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Yes, we have provided a variety range of
                            course from beginner to intermediate level to prepare your next big career,</p>
                    </div>
                </div>
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#EEF2FF] has-[.hide]:bg-transparent border-t-4 border-[#4F46E5] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">How long does the implementation take?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis
                            explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#EEF2FF] has-[.hide]:bg-transparent border-t-4 border-[#4F46E5] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Do you provide the job-guarantee program?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#EEF2FF] has-[.hide]:bg-transparent border-t-4 border-[#4F46E5] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-4">
                        <span class="font-semibold text-lg text-left">How to issue all course certificates?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
