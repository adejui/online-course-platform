<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}') }}" />
    <title>{{ $title }}</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script> --}}
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />

    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')

</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
                <img src="{{ asset('assets/img/logo-ct-dark.png') }}"
                    class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                    alt="main_logo" />
                <img src="{{ asset('assets/img/logo-ct.png') }}"
                    class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Argon Dashboard 2</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                @auth
                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 {{ request()->routeIs('dashboard') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} px-4 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap  transition-colors"
                                href="{{ route('dashboard') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'mentor')
                        <li class="mt-0.5 w-full">
                            <a class="{{ request()->routeIs('courses.index') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('courses.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-books"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kelola Kelas</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="mt-0.5 w-full">
                            <a class="{{ request()->routeIs('categories.index') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('categories.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                                    <i
                                        class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-bullet-list-67"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kelola Kategori</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="mt-0.5 w-full">
                            <a class="{{ request()->routeIs('mentors.index') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('mentors.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-single-02"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kelola Mentor</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="mt-0.5 w-full">
                            <a class="{{ request()->routeIs('mentor_courses.index') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('mentor_courses.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kelola Konten
                                    Mentor</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="mt-0.5 w-full">
                            <a class="{{ request()->routeIs('course_purchases.index') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('course_purchases.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-money-coins"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Transaksi</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'mentor')
                        <li class="mt-0.5 w-full">
                            <a class="{{ request()->routeIs('mentor.course_purchases.index') ? 'bg-blue-500/13 rounded-lg font-semibold text-slate-700' : 'text-dark' }} dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                href="{{ route('mentor.course_purchases.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-money-coins"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Transaksi</span>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>

    </aside>

    <!-- end sidenav -->
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-3 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">{{ $title }}</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">{{ $title }}</h6>
                </nav>

                <div class="flex items-end justify-end mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">

                    <!-- Navbar -->
                    <ul class="flex items-center justify-end space-x-4">

                        <!-- Toggle Sidebar (Opsional) -->
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <li class="flex items-center px-4">
                            <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                                <!-- fixed-plugin-button-nav  -->
                            </a>
                        </li>

                        <!-- User Dropdown -->
                        <li class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                @auth
                                    @if (Auth::user()->avatar)
                                        <div class="flex items-center gap-2">
                                            <div class="w-10 h-10">
                                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar"
                                                    class="w-full h-full object-cover rounded-full">
                                            </div>
                                            <div class="text-sm font-medium text-white">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/avatars/default-avatar.png') }}" alt="User Image"
                                            class="w-10 h-10 rounded-full">
                                    @endif
                                @endauth

                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.23 8.27a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg py-2 z-50">
                                <a href=""
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Profile</a>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Logout</a>
                            </div>
                        </li>
                    </ul>



                    {{-- <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <!-- online builder btn  -->
                        <!-- <li class="flex items-center">
                                                                                                                                                        <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
                                                                                                                                                      </li> -->
                        <li class="flex items-center">
                            <a href="./pages/sign-in.html"
                                class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                <i class="fa fa-user sm:mr-1"></i>
                                <span class="hidden sm:inline">Sign In</span>
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </nav>

        <!-- end Navbar -->

        @yield('content')

    </main>
</body>
<!-- plugin for charts  -->
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}?v=1.0.1" async></script>

</html>
