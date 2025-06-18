@extends('layouts.auth')
@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="hidden md:block md:w-[28%]">
            <img src="{{ asset('images/img-register-success.jpg') }}" alt="Login Image" class="h-full w-full object-cover">
        </div>


        <!-- Right Side -->
        <div class="w-full md:w-2/3 flex items-center justify-start pl-6">
            <div class="w-full max-w-md mx-16 px-6 py-12">
                <!-- Form Login -->
                <h2 class="text-3xl font-bold mb-2 text-center">Akun Berhasil Dibuat!</h2>

                <div class="items-center text-center mt-2 mb-16">
                    <p class="text-md text-gray-500">Anda saat ini terdaftar sebagai pelajar.</p>
                </div>

                <form class="text-center">
                    <p class="text-md text-gray-500 mb-4">Ingin jadi mentor dan berbagi ilmu?</p>
                    <div class="flex justify-between gap-4">
                        <a href="{{ route('front.index') }}"
                            class="w-1/2 bg-white text-black border border-black py-2 rounded-lg font-semibold hover:bg-gray-100 text-center">
                            Lewati
                        </a>
                        <a href="{{ route('register.mentor') }}"
                            class="w-1/2 bg-black text-white py-2 rounded-lg font-semibold hover:bg-gray-900 text-center">
                            Daftar Mentor
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
