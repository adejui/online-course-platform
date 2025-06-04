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
                <h2 class="text-2xl font-bold mb-6">Sign up to QWERTY</h2>

                <div class="items-center my-4">
                    <p class="text-sm text-gray-500">Daftar sebagai pelajar untuk bisa membeli kelas menarik.</p>
                    <p class="text-sm text-gray-500">(Anda dapat mendaftar sebagai mentor setelah ini.)</p>
                </div>

                <form method="post" action="{{ route('register.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-pink-200 focus:border-pink-500 rounded-lg px-3 py-3 text-sm focus:outline-none">
                    <p
                        class="text-[11px] leading-tight min-h-[14px] {{ $errors->has('name') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('name') ?: ' ' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-pink-200 focus:border-pink-500 rounded-lg px-3 py-3 text-sm focus:outline-none">
                    <p
                        class="text-[11px] leading-tight min-h-[14px] {{ $errors->has('email') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('email') ?: ' ' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-pink-200 focus:border-pink-500 rounded-lg px-3 py-3 text-sm focus:outline-none">
                    <p
                        class="text-[11px] leading-tight min-h-[14px] {{ $errors->has('password') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('password') ?: ' ' }}
                    </p>

                    <label class="block mt-2 text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                    <input type="file" name="avatar"
                        class="w-full border border-pink-200 focus:border-pink-500 rounded-lg px-3 py-3 text-sm focus:outline-none">
                    <p
                        class="text-[11px] leading-tight min-h-[25px] {{ $errors->has('avatar') ? 'text-red-500' : 'invisible' }}">
                        {{ $errors->first('avatar') ?: 'PNG, JPG, JPEG up to 2MB.' }}
                    </p>

                    <button type="submit"
                        class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-900">Create
                        Account</button>
                </form>

                <p class="mt-4 text-sm text-center text-gray-600">
                    Already have an account? <a href="{{ route('login') }}" class="underline">Sign In</a>
                </p>
            </div>
        </div>
    </div>
@endsection
