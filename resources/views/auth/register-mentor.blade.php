@extends('layouts.auth')
@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="hidden md:block md:w-[28%]">
            <img src="{{ asset('images/img-login.jpg') }}" alt="Login Image" class="h-full w-full object-cover">
        </div>


        <!-- Right Side -->
        <div class="w-full md:w-2/3 flex items-center justify-start pl-6">
            <div class="w-full max-w-md mx-16 px-6 py-12">
                <!-- Form Login -->
                <h2 class="text-3xl font-bold mb-1"2>Register as a Mentor</h2>

                <div class="items-center my-0">
                    <p class="text-sm text-gray-500 mb-4">Anda sudah terdaftar sebagai pelajar.</p>
                </div>

                <p class="text-sm text-gray-500 mb-1">Lengkapi informasi berikut untuk mendaftar sebagai mentor.</p>

                <form action="{{ route('register.mentor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="block text-sm font-medium text-gray-700 mb-1">Occupation</label>
                    <input type="text" name="occupation" value="{{ old('occupation') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300 hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                    <p
                        class="text-[11px] leading-tight min-h-[14px] mt-1 {{ $errors->has('occupation') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('occupation') ?: ' ' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">CV</label>
                    <input type="file" name="cv_file"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
           focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300
           hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                    <p
                        class="text-[11px] leading-tight min-h-[14px] mt-1 {{ $errors->has('cv_file') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('cv_file') ?: 'PDF file up to 2MB.' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">Bank Account Number</label>
                    <input type="text" name="bank_account_number" value="{{ old('bank_account_number') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
           focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300
           hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                    <p
                        class="text-[11px] leading-tight min-h-[14px] mt-1 {{ $errors->has('bank_account_number') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('bank_account_number') ?: ' ' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">Bank Name</label>
                    <input type="text" name="bank_name" value="{{ old('bank_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
           focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300
           hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                    <p
                        class="text-[11px] leading-tight min-h-[14px] mt-1 {{ $errors->has('bank_name') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('bank_name') ?: ' ' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">Account Holder Name</label>
                    <input type="text" name="account_holder_name" value="{{ old('account_holder_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
           focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300
           hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                    <p
                        class="text-[11px] leading-tight min-h-[14px] mt-1 {{ $errors->has('account_holder_name') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('account_holder_name') ?: ' ' }}
                    </p>


                    <div class="flex justify-between gap-4 mt-2">
                        <a href="{{ route('home') }}"
                            class="w-1/2 bg-white text-black border border-black py-2 rounded-lg font-semibold hover:bg-gray-100 text-center">
                            Batal
                        </a>
                        <button type="submit"
                            class="w-1/2 bg-black text-white py-2 rounded-lg font-semibold hover:bg-gray-900 text-center">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
