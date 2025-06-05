@extends('dashboard.layouts.app')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0 px-0">
        <!-- table 1 -->

        <div class="flex-none w-full pl-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Mentor</h6>
                        @if (session('delete'))
                            <div
                                class="mb-4 rounded-lg bg-gradient-to-tl from-red-600 to-red-400 text-white align-middle text-center px-4 py-3 text-sm">
                                {{ session('delete') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div
                                class="mb-4 rounded-lg bg-gradient-to-tl from-red-600 to-red-400 text-white align-middle text-center px-4 py-3 text-sm">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Nama</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Email</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Occupation</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mentors as $mentor)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ Storage::url($mentor->user->avatar) }}"
                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                            alt="user1" />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                            {{ $mentor->user->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $mentor->user->email }}</p>
                                            </td>
                                            <td
                                                class="p-2 align-middle leading-normal bg-transparent text-center border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $mentor->occupation }}</p>
                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <a href="{{ route('mentors.show', $mentor) }}"
                                                    class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                    Detail
                                                </a>
                                                <form action="{{ route('mentors.destroy', $mentor) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-gradient-to-tl from-red-600 to-red-400 hover:from-red-700 hover:to-red-500 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"
                                                        onclick="return confirm('Yakin hapus mentor ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td style="padding-top: 20px; padding-bottom: 20px;" colspan="8"
                                                class="text-center">Belum ada data mentor.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $mentors->appends(['candidate_page' => request('candidate_page')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 2 -->
        <div class="flex-none w-full px-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Calon Mentor</h6>
                        @if (session('success'))
                            <div
                                class="mb-4 rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 text-white align-middle text-center px-4 py-3 text-sm">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('reject'))
                            <div
                                class="mb-4 rounded-lg bg-gradient-to-tl from-red-600 to-red-400 text-white align-middle text-center px-4 py-3 text-sm">
                                {{ session('reject') }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Nama</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Occupation</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="border-t">
                                    @forelse ($candidateMentors as $candidateMentor)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ Storage::url($candidateMentor->user->avatar) }}"
                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                            alt="user1" />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                            {{ $candidateMentor->user->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $candidateMentor->occupation }}</p>
                                            </td>
                                            <td
                                                class="p-2 text-xs leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="bg-gradient-to-tl from-slate-600 to-slate-300 px-1 text-xxs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline uppercase leading-none text-white">{{ $candidateMentor->status }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <a href="{{ route('mentors.show', $candidateMentor) }}"
                                                    class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                    Detail
                                                </a>
                                                <form action="{{ route('mentors.accept', $candidateMentor) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah yakin ingin menerima mentor ini?')"
                                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                    @csrf
                                                    <button type="submit">ACC</button>
                                                </form>
                                                <form action="{{ route('mentors.reject', $candidateMentor) }}"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 hover:from-red-700 hover:to-red-500 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah yakin ingin menolak mentor ini?')">
                                                    @csrf
                                                    <button type="submit">REJECT</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td style="padding-top: 20px; padding-bottom: 20px;" colspan="8"
                                                class="text-center">Belum ada data calon mentor.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $candidateMentors->appends(['mentor_page' => request('mentor_page')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
