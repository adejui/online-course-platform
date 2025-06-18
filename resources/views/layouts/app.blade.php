<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-black font-poppins pt-10 pb-[50px]">
    @php
        $heroStyle = "background-image: url('" . asset('assets/background/Hero-Banner.png') . "')";
    @endphp

    @if (request()->routeIs('front.index'))
        <div id="hero-section"
            class="max-w-[1450px] mx-auto w-full flex flex-col gap-10 pb-[55px] bg-center bg-no-repeat bg-cover rounded-[32px]"
            style="{{ $heroStyle }}">
        @elseif (request()->routeIs('front.checkout'))
            <div id="checkout-section"
                class="max-w-[1400px] mx-auto w-full min-h-[calc(100vh-40px)] flex flex-col gap-[30px] bg-center bg-no-repeat bg-cover rounded-t-[32px] relative pb-6"
                style="{{ $heroStyle }}">
            @elseif (request()->routeIs('front.catalog') ||
                    request()->routeIs('front.category') ||
                    request()->routeIs('front.my_transaction') ||
                    request()->routeIs('front.my_course'))
                <div id="hero-section"
                    class="max-w-[1400px] mx-auto w-full flex flex-col gap-10 bg-center bg-no-repeat bg-cover rounded-[32px]"
                    style="{{ $heroStyle }}">
                @elseif (request()->routeIs('front.details') || request()->routeIs('front.learning'))
                    <div id="hero-section"
                        class="max-w-[1200px] mx-auto w-full h-[393px] flex flex-col gap-10 pb-[50px] bg-center bg-no-repeat bg-cover rounded-[32px] absolute transform -translate-x-1/2 left-1/2"
                        style="{{ $heroStyle }}">
    @endif

    <nav class="flex justify-between items-center py-6 px-[50px]">
        <a href="">
            <img src="{{ asset('assets/logo/logo.svg') }}" alt="logo">
        </a>
        <ul class="flex items-center gap-[30px] text-white">
            <li>
                <a href="{{ route('front.index') }}" class="font-semibold">Home</a>
            </li>
            <li>
                <a href="{{ route('front.catalog') }}" class="font-semibold">Kelas</a>
            </li>
            <li>
                <a href="{{ route('front.index') }}#category-section" class="font-semibold">Kategori</a>
            </li>
            {{-- @auth
                @if (auth()->user()->role === 'pelajar')
                    <li>
                        <a href="" class="font-semibold">Riwayat Pembelian</a>
                    </li>
                    <li>
                        <a href="" class="font-semibold">Kelas Saya</a>
                    </li>
                @endif
            @endauth --}}
        </ul>
        @auth
            <div class="flex justify-end relative z-[9999]"> <!-- z tinggi di sini -->
                <div class="flex gap-[10px] items-center" x-data="{ open: false }">
                    <div class="flex flex-col items-end justify-center">
                        <p class="font-semibold text-white">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="relative">
                        <button @click="open = !open"
                            class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0 focus:outline-none">
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover"
                                alt="photo">
                        </button>

                        <!-- DROPDOWN FIX -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg py-2 z-[9999]">
                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Dashboard</a>
                            @endif
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Profil</a>
                            @if (auth()->user()->role === 'pelajar')
                                <a href="{{ route('front.my_course') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Kelas Saya</a>
                                <a href="{{ route('front.my_transaction') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Riwayat
                                    Pembelian</a>
                            @endif
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        {{-- @auth
            <div class="flex gap-[10px] items-center" x-data="{ open: false }">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                </div>
                <div class="relative">
                    <button @click="open = !open"
                        class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0 focus:outline-none">
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover"
                            alt="photo">
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg py-2 z-50">
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Dashboard</a>
                        @endif

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Profil</a>

                        @if (auth()->user()->role === 'pelajar')
                            <a href="{{ route('front.my_course') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Kelas Saya</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Riwayat
                                Pembelian</a>
                        @endif

                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
        @endauth --}}
        @guest
            <div class="flex gap-[10px] items-center">
                <a href="{{ route('register') }}"
                    class="text-white font-semibold rounded-[20px] p-[12px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#4F46E5]">Register</a>
                <a href="{{ route('login') }}"
                    class="text-white font-semibold rounded-[20px] p-[12px_32px] bg-indigo-600 transition-all duration-300 hover:shadow-md hover:shadow-indigo-500/70">Login</a>
            </div>
        @endguest
    </nav>
    @if (request()->routeIs('front.catalog'))
        </div>
    @elseif (request()->routeIs('front.details'))
        </div>
    @elseif (request()->routeIs('front.learning'))
        </div>
    @elseif (request()->routeIs('front.my_transaction'))
        </div>
    @elseif (request()->routeIs('front.category'))
        </div>
    @elseif (request()->routeIs('front.my_course'))
        </div>
    @endif


    @yield('content')

    {{-- <footer
        class="max-w-[1200px] mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex justify-between">
            <a href="">
                <div>
                    <img src="{{ asset('assets/logo/logo-black.svg') }}" alt="logo">
                </div>
            </a>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Products</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Online Courses</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Career Guidance</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Expert Handbook</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Interview Simulations</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Company</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">About Us</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Media Press</a>
                    </li>
                    <li class="flex items-center gap-[10px]">
                        <a href="" class="text-[#6D7786]">Careers</a>
                        <div
                            class="gradient-badge w-fit p-[6px_10px] rounded-full border border-[#FED6AD] flex items-center">
                            <p class="font-medium text-xs text-[#FF6129]">We’re Hiring</p>
                        </div>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Developer APIs</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Resources</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Blog</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">FAQ</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Help Center</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">All Rights Reserved Alqowy BuildWithAngga 2024</p>
        </div>
    </footer> --}}

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('main.js') }}"></script>


</body>

</html>
