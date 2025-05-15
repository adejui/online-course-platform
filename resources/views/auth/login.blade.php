<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Dribbble Login Clone</title>
    @vite('resources/css/app.css')
</head>

<div class="min-h-screen flex flex-col md:flex-row">
    <div class="hidden md:block md:w-[28%]">
        <img src="{{ asset('images/img-login.jpg') }}" alt="Login Image" class="h-full w-full object-cover">
    </div>


    <!-- Right Side -->
    <div class="w-full md:w-2/3 flex items-center justify-start pl-6">
        <div class="w-full max-w-md mx-16 px-6 py-12">
            <!-- Form Login -->
            <h2 class="text-2xl font-bold mb-6">Sign in to QWERTY</h2>

            <!-- Sign in with Google -->
            <button
                class="w-full border border-gray-300 py-3 px-4 rounded-lg flex items-center justify-center gap-2 mb-4 hover:bg-gray-100">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                <span>Sign in with Google</span>
            </button>

            <div class="flex items-center my-4">
                <hr class="flex-grow border-t border-gray-300">
                <span class="mx-2 text-sm text-gray-500">or sign in with email</span>
                <hr class="flex-grow border-t border-gray-300">
            </div>

            @if (session('failed'))
                <div class="text-red-600 text-center text-base py-2 px-4">
                    {{ session('failed') }}
                </div>
            @endif


            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 mb-0 text-sm
           focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300
           hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                @error('email')
                    <p class="text-sm text-red-500 mb-0 mt-1">{{ $message }}</p>
                @enderror

                <div class="flex justify-between items-center mt-4 mb-2">
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <a href="#" class="text-sm text-gray-500 hover:underline">Forgot?</a>
                </div>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 mb-0 text-sm
           focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-300
           hover:shadow-md hover:shadow-pink-200 transition duration-200" />
                @error('password')
                    <p class="text-sm text-red-500 mb-0 mt-1">{{ $message }}</p>
                @enderror


                <button type="submit"
                    class="w-full bg-black text-white py-3 mt-6 rounded-lg font-semibold hover:bg-gray-900">Sign
                    In</button>
            </form>

            <p class="mt-4 text-sm text-center text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="underline">Sign up</a>
            </p>
        </div>
    </div>
</div>


</html>
