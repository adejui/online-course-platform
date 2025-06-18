@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-[10px] items-center">
        {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
            <div>
                <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#FF6129]">Berinvestasilah pada Diri Anda Hari Ini</p>
        </div> --}}
        <h2 class="font-bold text-[40px] leading-[60px] text-white">Checkout</h2>
    </div>
    <div class="flex gap-10 px-[100px] relative z-10">
        <div class="w-[400px] flex shrink-0 flex-col bg-white rounded-2xl p-5 gap-4 h-fit">
            <p class="font-bold text-lg">Kelas</p>
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-3">
                    <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/icon/Web Development 1.svg') }}" class="w-full h-full object-cover"
                            alt="photo">
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-semibold">Premium</p>
                        <p class="text-sm text-[#6D7786]">Akses selamanya</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-5">
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/icons8-approval-24.png') }}" class="w-full h-full object-cover"
                            alt="icon">
                    </div>
                    <p class="text-[#475466]">{{ $course->name }}</p>
                </div>
                <div class="flex gap-3">
                </div>
            </div>
            <p class="font-semibold text-[28px] leading-[42px]">Rp{{ number_format($course->price, 0, ',', '.') }}
            </p>
        </div>
        <form class="w-full flex flex-col bg-white rounded-2xl p-5 gap-5">
            <p class="font-bold text-lg">Kirim Pembayaran</p>
            <div class="flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/icons8-approval-48.png') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">Nama Rekening</p>
                    </div>
                    <p class="font-semibold">{{ $course->mentor->account_holder_name }}</p>
                    <input type="hidden" name="bankName" value="Angga Capital">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/icons8-approval-48.png') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">Nomor Rekening</p>
                    </div>
                    <p class="font-semibold">{{ $course->mentor->bank_account_number }}</p>
                    <input type="hidden" name="Nomor Rekening" value="22081996202191404">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/icons8-approval-48.png') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">Nama Bank</p>
                    </div>
                    <p class="font-semibold">{{ $course->mentor->bank_name }}</p>
                    <input type="hidden" name="Nama Akun" value="Alqowy Education First">
                </div>
            </div>
            <hr>
            <button
                class="p-[20px_32px] bg-indigo-600 hover:bg-indigo-700 text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-md hover:shadow-indigo-500/70">Bayar</button>
        </form>
    </div>
    </div>
@endsection
