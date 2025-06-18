@extends('layouts.app')
@section('content')
    <section id="Top-Categories" class="max-w-[1300px] mx-auto flex flex-col py-[70px] px-[10px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets//icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Kategori Terpopuler</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[35px] leading-[60px]">{{ $category->name }}</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Skill kekinian yang banyak dicari, peluang besar untuk
                    karier dengan penghasilan menjanjikan!</p>
            </div>
            @if (!$courses->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-[15px] gap-y-[15px] w-full">
                @else
                    <div class="gap-x-[15px] gap-y-[15px] w-full">
            @endif
            @forelse ($courses->take(12) as $course)
                <div class="course-card">
                    <div
                        class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[10px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#4F46E5]">
                        <a href="{{ route('front.details', $course) }}"
                            class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4">
                            <p class="flex justify-end text-sm text-end text-gray-500">
                                {{ $course->category->name }}
                            </p>

                            <a href="{{ route('front.details', $course) }}"
                                class="mt-2 font-semibold text-lg line-clamp-2 hover:line-clamp-none">{{ $course->name }}</a>

                            {{-- Harga atau Joined --}}
                            @if ($userId && $course->coursePurchases->where('user_id', $userId)->isNotEmpty())
                                <div class="flex items-center gap-2 mt-5 mb-1">
                                    <div
                                        class="flex items-center gap-2 h-10 justify-center mt-8 text-white text-sm font-semibold bg-indigo-600 rounded-full px-3 py-1 w-fit">
                                        <img src="{{ asset('assets/icon/icons8-approval-48 (1).png') }}" alt="check"
                                            class="w-7 h-w-7">
                                        DIBELI
                                    </div>
                                </div>
                            @else
                                @if ($course->price > 0)
                                    <p class="flex text-md text-gray-500">Rp{{ number_format($course->price, 0, ',', '.') }}
                                    </p>
                                @else
                                    <p class="flex text-md text-green-500 font-semibold">Gratis</p>
                                @endif
                                {{-- Mentor --}}
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
                            @endif

                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full text-center py-8">
                    <p class="text-gray-800 font-semibold text-xl">Belum ada Kelas tersedia di kategori ini.</p>
                </div>
            @endforelse
        </div>
        </div>

    </section>
    <section id="Zero-to-Success"
        class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets//icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Zero to Success People</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Happy & Success Students</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Acquiring skills and new high paying career become
                    much easier</p>
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
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="logo-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
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
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets//photo/photo4.png') }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career,
                            thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets//icon/star.svg') }}" alt="star">
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
                        <img src="{{ asset('assets//icon/medal-star.svg') }}" alt="icon">
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
                        <span class="font-semibold text-lg text-left">Can beginner join the course?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets//icon/add.svg') }}" alt="icon">
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
                            <img src="{{ asset('assets//icon/add.svg') }}" alt="icon">
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
                            <img src="{{ asset('assets//icon/add.svg') }}" alt="icon">
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
                            <img src="{{ asset('assets//icon/add.svg') }}" alt="icon">
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
