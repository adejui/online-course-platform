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
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="text-black font-poppins pt-10 pb-[50px]">
    <div style="background-image: url('{{ asset('assets/background/Hero-Banner.png') }}');" id="hero-section"
        class="max-w-[1200px] mx-auto w-full h-[393px] flex flex-col gap-10 pb-[50px] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden absolute transform -translate-x-1/2 left-1/2">
        <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="index.html">
                <img src="{{ asset('assets/logo/logo.svg') }}" alt="logo">
            </a>
            <ul class="flex items-center gap-[30px] text-white">
                <li>
                    <a href="" class="font-semibold">Home</a>
                </li>
                <li>
                    <a href="pricing.html" class="font-semibold">Kelas</a>
                </li>
                @auth
                    @if (auth()->user()->role === 'pelajar')
                        <li>
                            <a href="" class="font-semibold">Riwayat Pembelian</a>
                        </li>
                        <li>
                            <a href="" class="font-semibold">Kelas Saya</a>
                        </li>
                    @endif
                @endauth
            </ul>
            @auth
                <div class="flex gap-[10px] items-center">
                    <div class="flex flex-col items-end justify-center">
                        <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                    </div>
                    <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </a>
                        @elseif (auth()->user()->role === 'pelajar')
                            <a href="{{ route('logout') }}">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover"
                                    alt="photo">
                            </a>
                        @endif
                    </div>
                </div>
            @endauth
            @guest
                <div class="flex gap-[10px] items-center">
                    <a href="{{ route('register') }}"
                        class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Sign
                        Up</a>
                    <a href="{{ route('login') }}"
                        class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign
                        In</a>
                </div>
            @endguest
        </nav>
    </div>
    <section id="video-content" class="max-w-[1100px] w-full mx-auto mt-[130px]">
        <div class="video-player relative flex flex-nowrap gap-5">
            <div class="plyr__video-embed w-full overflow-hidden relative rounded-[20px]" id="player">
                <iframe
                    src="https://www.youtube.com/embed/{{ $video->video_path }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                    allowfullscreen allowtransparency allow="autoplay"></iframe>
            </div>
            <div
                class="video-player-sidebar flex flex-col shrink-0 w-[330px] h-[470px] bg-[#F5F8FA] rounded-[20px] p-5 gap-5 pb-0 overflow-y-scroll no-scrollbar">
                <p class="font-bold text-lg text-black">{{ $course->courseVideos->count() }} Video Materi</p>
                <div class="flex flex-col gap-3">
                    <div
                        class="group p-[12px_16px] flex items-center gap-[10px] bg-[#E9EFF3] rounded-full hover:bg-[#3525B3] transition-all duration-300">
                        <div class="text-black group-hover:text-white transition-all duration-300">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <a href="{{ route('front.details', $course) }}">
                            <p class="font-semibold group-hover:text-white transition-all duration-300">Course Trailer
                            </p>
                        </a>
                    </div>
                    @forelse ($course->courseVideos as $courseVideo)
                        @php
                            $currentVideoId = Route::current()->parameter('courseVideoId');
                            $isActive = $currentVideoId == $courseVideo->id;
                        @endphp
                        <div
                            class="text-white group p-[12px_16px] flex items-center gap-[10px] {{ $isActive ? 'bg-[#3525B3]' : 'bg-[#E9EFF3]' }}  rounded-full hover:bg-[#3525B3] transition-all duration-300">
                            <div
                                class="{{ $isActive ? 'text-white' : 'text-black' }} group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <a href="{{ route('front.learning', [$course, 'courseVideoId' => $courseVideo->id]) }}">
                                <p
                                    class="{{ $isActive ? 'text-white' : 'text-black' }} font-semibold group-hover:text-white transition-all duration-300">
                                    {{ $courseVideo->name }}</p>
                            </a>
                        </div>

                    @empty
                        <p>Tidak Ada Video Materi</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section id="Video-Resources" class="flex flex-col mt-5">
        <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-3">
            <h1 class="title font-extrabold text-[30px] leading-[45px]">{{ $course->name }}</h1>
            <div class="flex items-center gap-5">
                <div class="flex items-center gap-[6px]">
                    <div>
                        <img src="{{ asset('assets/icon/crown.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold">{{ $course->category->name }}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <div>
                        <img src="{{ asset('assets/icon/profile-2user.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold">{{ $course->coursePurchases->count() }} Pelajar</p>
                </div>
            </div>
        </div>
        <div
            class="max-w-[1100px] w-full mx-auto mt-10 tablink-container flex gap-6 px-4 sm:p-0 no-scrollbar overflow-x-scroll">
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]"
                onclick="openPage('About', this)" id="defaultOpen">Tentang</div>
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]"
                onclick="openPage('Reviews', this)">Ulasan</div>
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]"
                onclick="openPage('Discussions', this)">diskusi</div>
        </div>
        <div class="bg-[#F5F8FA] py-[50px]">
            <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-[70px]">
                <div class="flex gap-[50px]">
                    <div class="tabs-container w-[700px] flex shrink-0">
                        <div id="About" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Kembangkan Karier Anda</h3>
                                <p class="font-medium leading-[30px]">
                                    {{ $course->about }}
                                </p>
                                <div class="grid grid-cols-2 gap-x-[30px] gap-y-5">
                                    @forelse ($course->courseKeypoints as $keyPoint)
                                        <div class="benefit-card flex items-center gap-3">
                                            <div class="w-6 h-6 flex shrink-0">
                                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" alt="icon">
                                            </div>
                                            <p class="font-medium leading-[30px]">{{ $keyPoint->name }}</p>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                        </div>
                        <div id="Reviews" class="tabcontent hidden">
                            <div class="flex flex-col gap-1 w-[700px] shrink-0">

                                <!-- Judul -->
                                <h2 class="text-2xl font-bold text-gray-800 mb-1">Pelajar Kami yang Puas</h2>
                                <p class="text-sm text-gray-500 mb-6">
                                    Review setelah bergabung di kelas Full-Stack Laravel 11 React TypeScript: Web Book
                                    Home Service
                                </p>

                                @auth
                                    @if (auth()->user()->role === 'pelajar')
                                        <form action="{{ route('front.review') }}" method="POST" class="p-4">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">

                                            <h2 class="text-xl font-semibold mb-2">Beri Ulasan</h2>

                                            <!-- Rating Bintang -->
                                            <div class="flex items-center space-x-1 mb-4" x-data="{ rating: 0 }">
                                                <template x-for="star in 5" :key="star">
                                                    <button type="button" @click="rating = star"
                                                        :class="rating >= star ? 'text-yellow-400' : 'text-gray-300'"
                                                        class="text-2xl focus:outline-none">
                                                        ★
                                                    </button>
                                                </template>
                                                <input type="hidden" name="rating" :value="rating" />
                                            </div>

                                            <!-- Ulasan Teks -->
                                            <div class="mb-4">
                                                <label class="block text-sm font-medium text-gray-700 mb-1"
                                                    for="review">
                                                    Tulis Ulasan
                                                </label>
                                                <textarea id="review" name="review" rows="4"
                                                    class="w-full bg-gray-100 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                                    placeholder="Bagikan pengalaman Anda..."></textarea>
                                            </div>

                                            <!-- Tombol Submit -->
                                            <button type="submit"
                                                class="bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] text-white text-sm px-4 py-2 rounded-full font-medium">
                                                Kirim Ulasan
                                            </button>
                                        </form>
                                    @endif
                                @endauth

                                <!-- Tambahkan Alpine.js untuk interaktivitas -->
                                <script src="https://unpkg.com/alpinejs" defer></script>
                                <div>
                                    {{-- 4 Review Pertama --}}
                                    <div id="preview-reviews" class="grid md:grid-cols-2 gap-6">
                                        @foreach ($previewReviews as $review)
                                            @include('components.review-card', ['review' => $review])
                                        @endforeach
                                    </div>

                                    {{-- Semua review (disembunyikan dulu) --}}
                                    <div id="all-reviews" class="grid md:grid-cols-2 gap-6 hidden">
                                        @foreach ($allReviews as $review)
                                            @include('components.review-card', ['review' => $review])
                                        @endforeach
                                    </div>

                                    {{-- Tombol toggle --}}
                                    @if ($allReviews->count() > 4)
                                        <div class="text-center mt-6">
                                            <button id="toggleReviewBtn" onclick="toggleReviews()"
                                                class="px-4 py-2 bg-[#FF6129] rounded-full text-white text-sm font-semibold hover:shadow-[0_10px_20px_0_#FF612980]">
                                                Lihat Semua Ulasan
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <script>
                                    function toggleReviews() {
                                        const preview = document.getElementById('preview-reviews');
                                        const all = document.getElementById('all-reviews');
                                        const button = document.getElementById('toggleReviewBtn');

                                        const showingAll = !all.classList.contains('hidden');

                                        if (showingAll) {
                                            all.classList.add('hidden');
                                            preview.classList.remove('hidden');
                                            button.textContent = 'Lihat Semua Ulasan';
                                        } else {
                                            preview.classList.add('hidden');
                                            all.classList.remove('hidden');
                                            button.textContent = 'Sembunyikan Ulasan';
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                        <div id="Discussions" class="tabcontent hidden">
                            <div class="flex flex-col gap-6 w-[700px] shrink-0">

                            </div>
                            <!-- Discussions -->
                            <div class="max-w-3xl mx-auto space-y-3">


                                <!-- Form Bertanya -->
                                <div id="formTanya" class="tabcontent hidden">

                                    <a href="#listDiskusi"
                                        class="flex items-center gap-2 text-blue-600 font-semibold hover:underline hover:text-blue-800 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                        Kembali
                                    </a>



                                    <form action="{{ route('front.discussion') }}" method="POST" class="space-y-4">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1"
                                                for="content">
                                                Tulis Pertanyaan
                                            </label>
                                            <textarea id="content" name="content" rows="4"
                                                class="w-full bg-gray-100 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                                placeholder="Tulis pertanyaan disini"></textarea>
                                            @error('content')
                                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Submit button --}}
                                        <div>
                                            <button type="submit"
                                                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-full shadow">
                                                Kirim Pertanyaan
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <script>
                                    function toggleFormTanya() {
                                        const form = document.getElementById('formTanya');
                                        const list = document.getElementById('listDiskusi');

                                        const isHidden = form.classList.contains('hidden');

                                        if (isHidden) {
                                            form.classList.remove('hidden');
                                            list.classList.add('hidden');
                                        } else {
                                            form.classList.add('hidden');
                                            list.classList.remove('hidden');
                                        }
                                    }
                                </script>

                                <!-- Daftar Diskusi -->
                                <!-- LIST DISKUSI -->
                                <div id="listDiskusi">

                                    <div class="flex justify-end">
                                        <div class="tablink bg-[#FF6129] text-white font-semibold px-5 py-2 rounded-full text-lg h-[47px] transition-all duration-300 cursor-pointer"
                                            onclick="toggleFormTanya()">
                                            Mulai Bertanya
                                        </div>
                                    </div>

                                    <h2 class="text-2xl font-bold">Masalah yang dialami oleh siswa</h2>

                                    @forelse ($discussions as $discussion)
                                        <div class="block transition hover:rounded-2xl hover:shadow-md mt-5"
                                            onclick="toggleDetailDiscussion()">
                                            <div class="bg-white rounded-2xl p-5 shadow-sm flex items-start space-x-4">
                                                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                                    class="w-10 h-10 rounded-full object-cover" />
                                                <div class="flex-1">
                                                    <p class="font-bold mb-2 text-xl text-gray-800">
                                                        {{ \Illuminate\Support\Str::words(strip_tags($discussion->content), 7, '...') }}
                                                    </p>
                                                    <div
                                                        class="flex items-center text-sm text-gray-500 space-x-4 mb-1">
                                                        <span>{{ $discussion->replies_count }} balasan</span>
                                                        @php
                                                            $hasMentorReply = $discussion->replies->contains(
                                                                fn($reply) => $reply->user->role === 'mentor',
                                                            );
                                                        @endphp

                                                        @if ($hasMentorReply)
                                                            <span>Dijawab mentor</span>
                                                        @elseif (!$hasMentorReply)
                                                            <span>X Dijawab mentor</span>
                                                        @endif
                                                    </div>
                                                    <p class="text-xs text-gray-400">
                                                        Ditanya pada
                                                        {{ $discussion->created_at->translatedFormat('d F Y \j\a\m H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="mt-4 text-gray-500">Belum ada diskusi.</p>
                                    @endforelse
                                </div>

                                <!-- DETAIL DISKUSI KOSONG -->
                                <div id="detailDiscussion" class="hidden">
                                    <div class="max-w-3xl mx-auto mt-10 space-y-6 text-gray-800">

                                        <!-- Pertanyaan -->
                                        <div class="bg-white p-6 rounded-2xl shadow-sm">
                                            <div class="flex items-center space-x-4">
                                                <img src="{{ asset('images/default-avatar.png') }}" alt="User Avatar"
                                                    class="w-10 h-10 rounded-full object-cover" />
                                                <div>
                                                    <p class="font-bold text-lg">
                                                        {{ $discussion->user->name ?? 'Not found' }}</p>
                                                </div>
                                            </div>

                                            <div class="flex items-center space-x-4 mt-3 text-sm">
                                                <div class="flex items-center space-x-1 text-blue-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 8h2a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h2" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 15v-6M9 12h6" />
                                                    </svg>
                                                    <span>replied</span>
                                                </div>
                                                <div class="text-green-600 font-semibold">✅ Dijawab mentor</div>
                                            </div>

                                            <p class="text-sm text-gray-500 mt-2">Ditanya pada
                                                {{ $discussion->created_at->translatedFormat('d F Y \j\a\m H:i') }}</p>

                                            <p class="mt-4">{{ $discussion->content }}</p>
                                        </div>

                                        <!-- Jawaban -->
                                        <div>
                                            <h2 class="text-lg font-bold">Jawaban</h2>
                                            <p class="text-sm text-gray-600 mb-4">Berikut balasan dari mentor atau
                                                pengguna lain:</p>

                                            @foreach ($discussion->replies as $reply)
                                                <div class="bg-white p-6 rounded-2xl shadow-sm mb-4">
                                                    <div class="flex items-start space-x-4">
                                                        <img src="{{ $reply->user->avatar_url ?? asset('images/default-avatar.png') }}"
                                                            class="w-10 h-10 rounded-full object-cover"
                                                            alt="avatar" />
                                                        <div class="flex-1">
                                                            <div class="flex items-center space-x-2">
                                                                <p class="font-semibold text-blue-800">
                                                                    {{ $reply->user->name }}</p>
                                                                @if ($reply->user->role === 'mentor')
                                                                    <span
                                                                        class="bg-blue-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">MENTOR</span>
                                                                @endif
                                                            </div>
                                                            <p class="text-sm text-gray-500">
                                                                {{ $reply->user->role_description ?? 'User' }}</p>

                                                            <p class="mt-3">{{ $reply->content }}</p>
                                                            <p class="text-xs text-gray-400 mt-2">Dibalas pada
                                                                {{ $reply->created_at->translatedFormat('d F Y') }}</p>

                                                            <div class="flex items-center mt-4 space-x-4">
                                                                <button
                                                                    class="flex items-center space-x-1 text-gray-600 text-sm">
                                                                    👍 <span>{{ $reply->likes_count ?? 0 }}</span>
                                                                </button>
                                                                <button onclick="toggleReplyForm({{ $reply->id }})"
                                                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1.5 rounded-full">
                                                                    Reply
                                                                </button>
                                                            </div>

                                                            <!-- Form Balas Jawaban -->
                                                            <div id="reply-form-{{ $reply->id }}"
                                                                class="hidden mt-4">
                                                                <form
                                                                    action="{{ route('discussion.reply', $reply->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <textarea name="content" rows="3" class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                                                        placeholder="Tulis balasan..."></textarea>
                                                                    <div class="flex justify-end mt-2">
                                                                        <button
                                                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-full text-sm">
                                                                            Kirim Balasan
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Tombol Beri Jawaban -->
                                        <div class="flex justify-end">
                                            <button
                                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full font-semibold">
                                                Beri Jawaban
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function toggleReplyForm(replyId) {
                                        const el = document.getElementById(`reply-form-${replyId}`);
                                        if (el.classList.contains('hidden')) {
                                            el.classList.remove('hidden');
                                        } else {
                                            el.classList.add('hidden');
                                        }
                                    }
                                </script>


                            </div>
                            <script>
                                function toggleDetailDiscussion() {
                                    const form = document.getElementById('detailDiscussion');
                                    const list = document.getElementById('listDiskusi');

                                    form.classList.remove('hidden');
                                    list.classList.add('hidden');
                                }
                            </script>

                        </div>
                    </div>
                    <div class="mentor-sidebar flex flex-col gap-[30px] w-full">
                        <div class="mentor-info bg-white flex flex-col gap-4 rounded-2xl p-5">
                            <p class="font-bold text-lg text-left w-full">Mentor</p>
                            <div class="flex items-center justify-between w-full">
                                <div class="flex items-center gap-3">
                                    <a href=""
                                        class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ Storage::url($course->mentor->user->avatar) }}"
                                            class="w-full h-full object-cover" alt="foto">
                                    </a>
                                    <div class="flex flex-col gap-[2px]">
                                        <a href="" class="font-semibold">{{ $course->mentor->user->name }}</a>
                                        <p class="text-sm text-[#6D7786]">{{ $course->mentor->occupation }}</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="bg-white flex flex-col gap-2 rounded-2xl p-5">
                            <p class="font-normal text-lg text-left w-full">Investasi Terbaik untuk Masa Depan Anda</p>

                            <p class="font-bold text-left w-full" style="font-size: 35px">
                                Rp{{ number_format($course->price, 0, ',', '.') }}</p>
                            <div class="flex items-center gap-3">
                                <div class="benefit-card flex items-center gap-3">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{ asset('assets/icon/check.jpg') }}" alt="icon">
                                    </div>
                                    <p class="font-thin leading-[30px]">Akses Selamanya</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="benefit-card flex items-center gap-3">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{ asset('assets/icon/check.jpg') }}" alt="icon">
                                    </div>
                                    <p class="font-thin leading-[30px]">Forum Diskusi</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="benefit-card flex items-center gap-3">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{ asset('assets/icon/check.jpg') }}" alt="icon">
                                    </div>
                                    <p class="font-thin leading-[30px]">Materi Berkualitas</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="benefit-card flex items-center gap-3">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{ asset('assets/icon/check.jpg') }}" alt="icon">
                                    </div>
                                    <p class="font-thin leading-[30px]">Video Pembelajaran</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="benefit-card flex items-center gap-3">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{ asset('assets/icon/check.jpg') }}" alt="icon">
                                    </div>
                                    <p class="font-thin leading-[30px]">Mentor Berpengalaman</p>
                                </div>
                            </div>


                            <a href="{{ route('front.checkout', $course) }}"
                                class="text-white text-center font-semibold rounded-[30px] p-[16px_32px] mt-5 bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-full">Beli
                                Kelas</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                <div
                    class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                    <div>
                        <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
                    </div>
                    <p class="font-medium text-sm text-[#FF6129]">Kembangkan Karir Anda</p>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Dapatkan Jawaban Anda</h2>
                    <p class="text-lg text-[#475466]">Saatnya meningkatkan keterampilan tanpa batas!</p>
                </div>
            </div>
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Apakah pemula bisa mengikuti kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Ya, kami telah menyediakan berbagai macam
                            kursus dari tingkat pemula hingga menengah untuk mempersiapkan karir besar Anda berikutnya,
                        </p>
                    </div>
                </div>
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">Berapa lama waktu penerapannya?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis
                            explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Apakah Anda menyediakan program jaminan kerja?
                        </span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                <div
                    class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-4">
                        <span class="font-semibold text-lg text-left">Bagaimana cara menerbitkan semua sertifikat
                            kursus?
                        </span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icon/add.svg') }}" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script src="{{ asset('main.js') }}"></script>
</body>

</html>
