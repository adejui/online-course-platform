<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>

<body class="text-black font-poppins pt-10">
    <div id="checkout-section"
        class="max-w-[1200px] mx-auto w-full min-h-[calc(100vh-40px)] flex flex-col gap-[30px] bg-[url('assets/background/Hero-Banner.png')] bg-center bg-no-repeat bg-cover rounded-t-[32px] overflow-hidden relative pb-6">
        <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="index.html">
                <img src="{{ asset('assets/logo/logo.svg') }}" alt="logo">
            </a>
            <ul class="flex items-center gap-[30px] text-white">
                <li>
                    <a href="" class="font-semibold">Home</a>
                </li>
                <li>
                    <a href="pricing.html" class="font-semibold">kelas</a>
                </li>
                <li>
                    <a href="" class="font-semibold">riwayat pembelian</a>
                </li>
                <li>
                    <a href="" class="font-semibold">kelas</a>
                </li>
            </ul>
            <div class="flex gap-[10px] items-center">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">{{ Auth::user()->name }}</p>
                    <!-- <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">PRO</p> -->
                </div>
                <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover"
                        alt="photo">
                </div>
            </div>
        </nav>
        <div class="flex flex-col gap-[10px] items-center">
            <div
                class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Berinvestasilah pada Diri Anda Hari Ini</p>
            </div>
            <h2 class="font-bold text-[40px] leading-[60px] text-white">Checkout</h2>
        </div>
        <div class="flex gap-10 px-[100px] relative z-10">
            <div class="w-[400px] flex shrink-0 flex-col bg-white rounded-2xl p-5 gap-4 h-fit">
                <p class="font-bold text-lg">Kelas</p>
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('assets/icon/Web Development 1.svg') }}"
                                class="w-full h-full object-cover" alt="photo">
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
                            <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <p class="text-[#475466]">{{ $course->name }}</p>
                    </div>
                    <div class="flex gap-3">
                    </div>
                </div>
                <p class="font-semibold text-[28px] leading-[42px]">Rp{{ $course->price }}</p>
            </div>
            <form class="w-full flex flex-col bg-white rounded-2xl p-5 gap-5">
                <p class="font-bold text-lg">Kirim Pembayaran</p>
                <div class="flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover"
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
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}"
                                    class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Nomor Rekening</p>
                        </div>
                        <p class="font-semibold">{{ $course->mentor->bank_account_number }}</p>
                        <input type="hidden" name="Nomor Rekening" value="22081996202191404">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}"
                                    class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Nama Bank</p>
                        </div>
                        <p class="font-semibold">{{ $course->mentor->bank_name }}</p>
                        <input type="hidden" name="Nama Akun" value="Alqowy Education First">
                    </div>
                </div>
                <hr>
                <button
                    class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Bayar</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('main.js') }}"></script>

</body>

</html>
