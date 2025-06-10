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
</head>

<body class="text-black font-poppins pt-10 pb-[50px]">
    <div id="hero-section"
        class="max-w-[1200px] mx-auto w-full h-[393px] flex flex-col gap-10 pb-[50px] bg-[url('assets/background/Hero-Banner.png')] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden absolute transform -translate-x-1/2 left-1/2">
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
                <li>
                    <a href="" class="font-semibold">Riwayat Pembelian</a>
                </li>
                <li>
                    <a href="" class="font-semibold">Kelas Saya</a>
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
                        <p class="font-semibold group-hover:text-white transition-all duration-300">Course Trailer</p>
                    </div>
                    @forelse ($course->courseVideos as $courseVideo)
                        <div
                            class="group p-[12px_16px] flex items-center gap-[10px] bg-[#3525B3]  rounded-full hover:bg-[#3525B3] transition-all duration-300">
                            <div class="text-white group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <a href="{{ route('front.learning', [$course, 'courseVideoId' => $courseVideo->id]) }}">
                                <p class="font-semibold group-hover:text-white transition-all duration-300 text-white">
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
            class="max-w-[1100px] w-full mx-auto mt-10 tablink-container flex gap-3 px-4 sm:p-0 no-scrollbar overflow-x-scroll">
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
                        <div id="Resources" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Resources</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium
                                    quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam
                                    nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>
                            </div>
                        </div>
                        <div id="Reviews" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Reviews</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium
                                    quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam
                                    nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>
                            </div>
                        </div>
                        <div id="Discussions" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Discussions</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium
                                    quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam
                                    nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>
                            </div>
                        </div>
                        <div id="Rewards" class="tabcontent hidden">
                            <div class="flex flex-col gap-5 w-[700px] shrink-0">
                                <h3 class="font-bold text-2xl">Rewards</h3>
                                <p class="font-medium leading-[30px]">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eos et accusantium
                                    quia exercitationem reiciendis? Doloribus, voluptate natus voluptas deserunt aliquam
                                    nesciunt blanditiis ipsum porro hic! Iusto maxime ullam soluta.
                                </p>
                            </div>
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

                            <p class="font-bold text-left w-full" style="font-size: 35px">Rp500.000</p>
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


                            <a href=""
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
