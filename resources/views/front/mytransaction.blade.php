@extends('layouts.app')
@section('content')
    <section id="Top-Categories" class="max-w-[1300px] mx-auto flex flex-col py-[70px] px-[10px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col">
                <h2 class="font-bold text-[35px] leading-[60px]">Transaksi Saya</h2>
            </div>


            <div class="overflow-x-auto rounded-xl bg-[#F5F8FA] shadow-sm">
                <table class="min-w-full text-sm text-left table-auto">
                    <thead class="bg-gray-50 font-semibold text-gray-700">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Thumbnail</th>
                            <th class="px-4 py-3">Nama Kelas</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        @forelse ($purchases as $purchase)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-semibold text-[#101828]">#BWA231937</td>
                                <td class="px-4 py-3">
                                    <img src="{{ Storage::url($purchase->course->thumbnail) }}" alt="Cover 1"
                                        class="h-14 w-20 object-cover rounded-lg">
                                </td>
                                <td class="px-4 py-3">
                                    {{ $purchase->course->name }}
                                </td>
                                <td class="px-4 py-3">Rp{{ number_format($purchase->course->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    {{ $purchase->created_at->format('Y-m-d') }}<br>{{ $purchase->created_at->format('H:i:s') }}
                                </td>
                                <td class="px-4 py-3 text-green-600 font-medium">SUCCESS</td>
                                <td class="px-4 py-3">
                                    <button
                                        class="bg-gray-100 hover:bg-gray-200 text-sm font-semibold px-4 py-2 rounded-full text-gray-800">
                                        Download Invoice
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td style="padding-top: 20px; padding-bottom: 20px;" colspan="8" class="text-center">
                                    Belum ada data transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="flex justify-end items-center px-4 py-3 bg-white border-t border-gray-100">
                    {{ $purchases->links() }}
                </div>
            </div>
        </div>

    </section>
    <section id="Zero-to-Success"
        class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div
                class="gradient-badgee w-fit p-[8px_16px] rounded-full border border-[#D6D8FF] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets//icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#4F46E5]">Sukses Dimulai dari Langkah Pertama</p>
            </div>
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
                <div
                    class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                    <div>
                        <img src="{{ asset('assets//icon/medal-star.svg') }}" alt="icon">
                    </div>
                    <p class="font-medium text-sm text-[#FF6129]">Grow Your Career</p>
                </div>
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
