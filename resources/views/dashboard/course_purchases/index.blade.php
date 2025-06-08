@extends('dashboard.layouts.app')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative px-8 flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="py-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h6 class="dark:text-white font-bold" style="font-size: x-large;">Transaksi</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom dark:bg-gray-800">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Mentor
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Jumlah Kelas
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Jumlah Pembelian
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Total
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mentors as $mentor)
                                        <tr class="border-b text-gray-800">
                                            <td
                                                class="px-6 py-4 text-base font-semibold leading-normal dark:text-white align-top">
                                                {{ $mentor->user->name }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $mentor->courses_count }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $mentor->total_pembelian ?? 0 }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                Rp{{ number_format($mentor->total_penjualan ?? 0, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="{{ route('course_purchases.show', $mentor) }}"
                                                    style="background-color: #60A5FA;"
                                                    class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold leading-none text-white">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center">Belum ada data transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $mentors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
