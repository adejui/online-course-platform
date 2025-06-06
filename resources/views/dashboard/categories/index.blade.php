@extends('dashboard.layouts.app')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white" style="font-size: large;">Kategori</h6>
                        <a href="{{ route('categories.create') }}"
                            class="items-center text-xs flex justify-center text-center font-bold text-white bg-slate-700 rounded-lg hover:bg-slate-800"
                            style="width: 130px; height: 40px;">
                            Tambah Kategori
                        </a>
                    </div>
                    @if (session('success'))
                        <div
                            class="mt-3 md:max-w-1/2 mb-4 mx-5 rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 text-white align-middle text-center px-4 py-3 text-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div style="background-color: #EF4444"
                            class="mt-3 md:max-w-1/2 mb-4 mx-5 rounded-lg text-white align-middle text-center px-4 py-3 text-md">
                            {{ session('delete') }}
                        </div>
                    @endif
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Ikon</th>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Nama</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Created</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Updated</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ Storage::url($category->icon) }}" style="width: 100px"
                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out rounded-lg"
                                                            alt="icon" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-s, font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $category->name }}</p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $category->created_at }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $category->updated_at }}</span>
                                            </td>
                                            <td
                                                class="p-2 align-middle leading-normal text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <a href="{{ route('categories.edit', $category) }}"
                                                    style="background-color: orange"
                                                    class=" px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                    Edit
                                                </a>
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: red;"
                                                        class=" px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"
                                                        onclick="return confirm('Yakin hapus kategori ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td style="padding-top: 20px; padding-bottom: 20px;" colspan="8"
                                                class="text-center">Belum ada data kategori.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
