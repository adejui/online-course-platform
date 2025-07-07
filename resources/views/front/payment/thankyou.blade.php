@extends('layouts.app')
@section('content')
    <section id="Top-Categories" class="max-w-[1300px] items-center mx-auto flex flex-col py-[0px] px-[10px] gap-[00px]">

        <div class="w-1/3 d-flex justify-items-center justify-center items-center">
            <div class="w-[350px] h-[350px]">
                <img src="{{ asset('images/payment-success1.jpg') }}" alt="Pembayaran Berhasil"
                    class="w-full h-full object-contain mx-auto">
            </div>

            <div class="flex flex-col gap-3 max-w-xl">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Pembayaran Berhasil</h2>
                <p class="text-gray-500 text-lg">
                    Kami telah memberikan akses kelas kepada akun Anda.<br>
                    Silakan gabung group konsultasi belajar untuk mulai belajar bersama mentor.
                </p>
            </div>

            <div class="mt-10">
                <a href="{{ route('front.my_course') }}"
                    class="mt-6 px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-full transition-all duration-300">
                    Mulai Belajar
                </a>
            </div>
        </div>

    </section>
@endsection
