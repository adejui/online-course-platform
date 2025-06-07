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
                        <h6 class="dark:text-white font-bold" style="font-size: x-large;">
                            Transaksi Saya
                        </h6>
                    </div>
                    <div class="flex-auto px-0 pt-2 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom dark:bg-gray-800">
                                    <tr class=" text-left text-sm font-semibold text-gray-700">
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Nama Kelas</th>
                                        <th
                                            class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Harga</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Total Pembelian</th>
                                        <th
                                            class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-900 opacity-70">
                                            Total Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-800">
                                    @php
                                        $totalPembelian = 0;
                                        $totalPenjualan = 0;
                                    @endphp

                                    @forelse ($courses as $course)
                                        @php
                                            $pembelian = $course->total_pembelian ?? 0;
                                            $penjualan = $course->total_penjualan ?? 0;

                                            $totalPembelian += $pembelian;
                                            $totalPenjualan += $penjualan;
                                        @endphp

                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-6 py-3">{{ $course->name }}</td>
                                            <td class="px-6 py-3 text-right">
                                                Rp{{ number_format($course->price, 0, ',', '.') }}</td>
                                            <td class="px-6 py-3 text-center">{{ $pembelian }}</td>
                                            <td class="px-6 py-3 text-right">
                                                Rp{{ number_format($penjualan, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center">Belum ada data transaksi.</td>
                                        </tr>
                                    @endforelse
                                    @if ($courses->hasPages())
                                        {{-- Subtotal halaman saat ini --}}
                                        <tr class="bg-gray-200 text-base font-semibold border-t">
                                            <td class="px-6 py-3">Subtotal (Halaman Ini)</td>
                                            <td></td>
                                            <td class="text-center px-6 py-3">{{ $total_pembelian_page }}</td>
                                            <td class="text-right px-6 py-3">
                                                Rp{{ number_format($total_penjualan_page, 0, ',', '.') }}</td>
                                        </tr>
                                    @endif

                                    {{-- Total global --}}
                                    <tr
                                        class="bg-gray-100 text-lg dark:bg-gray-700 font-bold border-t dark:border-white/20">
                                        <td class="px-6 py-3">Total Keseluruhan</td>
                                        <td class="px-6 py-3"></td>
                                        <td class="text-center px-6 py-3">{{ $total_pembelian_all }}</td>
                                        <td class="text-right px-6 py-3">
                                            Rp{{ number_format($total_penjualan_all, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
