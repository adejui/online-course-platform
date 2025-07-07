@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-[10px] items-center">
        <h2 class="font-bold text-[40px] leading-[60px] text-white">Checkout</h2>
    </div>

    <div class="flex gap-10 px-[100px] relative z-10 mt-10">
        {{-- LEFT: Ringkasan Kelas --}}
        <div class="w-[400px] flex shrink-0 flex-col bg-white rounded-2xl p-5 gap-4 h-fit shadow-lg">
            <p class="font-bold text-lg">Kelas</p>
            <div class="flex items-center gap-3">
                <div class="w-[50px] h-[50px] rounded-full overflow-hidden">
                    <img src="{{ asset('assets/icon/Web Development 1.svg') }}" class="w-full h-full object-cover"
                        alt="photo">
                </div>
                <div class="flex flex-col gap-[2px]">
                    <p class="font-semibold">Premium</p>
                    <p class="text-sm text-[#6D7786]">Akses selamanya</p>
                </div>
            </div>
            <hr>
            <div class="flex gap-3">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/icon/icons8-approval-24.png') }}" class="w-full h-full object-cover"
                        alt="icon">
                </div>
                <p class="text-[#475466]">{{ $course->name }}</p>
            </div>
            <p class="font-semibold text-[28px] leading-[42px]">Rp{{ number_format($course->price, 0, ',', '.') }}</p>
        </div>

        {{-- RIGHT: Informasi Pembayaran --}}
        <div class="w-full flex flex-col bg-white rounded-2xl p-5 gap-5 shadow-lg">
            <p class="font-bold text-lg">Kirim Pembayaran</p>
            <div class="flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6">
                            <img src="{{ asset('assets/icon/icons8-approval-48.png') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">Nama Rekening</p>
                    </div>
                    <p class="font-semibold">{{ $course->mentor->account_holder_name }}</p>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6">
                            <img src="{{ asset('assets/icon/icons8-approval-48.png') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">Nomor Rekening</p>
                    </div>
                    <p class="font-semibold">{{ $course->mentor->bank_account_number }}</p>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6">
                            <img src="{{ asset('assets/icon/icons8-approval-48.png') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">Nama Bank</p>
                    </div>
                    <p class="font-semibold">{{ $course->mentor->bank_name }}</p>
                </div>
            </div>
            <hr>

            {{-- Tombol Bayar Midtrans --}}
            <button type="button" id="pay-button"
                class="p-[20px_32px] bg-indigo-600 hover:bg-indigo-700 text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-md hover:shadow-indigo-500/70">
                Bayar
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Midtrans Snap Script --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>

    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            fetch("/create-transaction", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        course_id: {{ $course->id }}
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("HTTP status " + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.snapToken) {
                        throw new Error("SnapToken is missing in response");
                    }
                    snap.pay(data.snapToken);
                })
                .catch(error => {
                    alert("Terjadi error: " + error.message);
                    console.error(error);
                });
        });
    </script>
@endsection
