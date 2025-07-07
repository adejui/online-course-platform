@extends('layouts.app-invoice')

@section('content')
    <section class="max-w-4xl mx-auto py-2 px-4">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Invoice Kelas</h1>
            <p class="text-gray-600 mt-1">Unduh bukti pembayaran kelas sebagai dokumentasi pribadi</p>
        </div>

        <div class="bg-gray-100 p-12 rounded-lg">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex justify-between items-start mb-4">
                    {{-- Logo --}}
                    <img src="{{ asset('assets/logo/logo3.png') }}" alt="Logo" class="w-60 mb-6">

                    {{-- Info --}}
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Invoice Date: {{ $purchase->created_at->format('d-M-Y') }}</p>
                        <p class="text-sm text-gray-600">Status: <span class="font-semibold text-green-600">SUCCESS</span>
                        </p>
                    </div>
                </div>

                <h2 class="text-xl font-bold text-gray-800 mb-2">#{{ $purchase->purchase_code }}</h2>
                <p class="text-gray-700 font-medium mb-4">Kelas: <span
                        class="font-semibold">{{ $purchase->course->name }}</span></p>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-1">Invoiced By:</h3>
                        <p class="text-sm text-gray-700">{{ $purchase->course->mentor->user->name }}</p>
                        <p class="text-sm text-gray-700">{{ $purchase->course->mentor->user->email }}</p>
                        <p class="text-sm text-gray-700">{{ $purchase->course->mentor->phone_number }} (WhatsApp)</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-1">Invoiced To:</h3>
                        <p class="text-sm text-gray-700">{{ $purchase->user->name }}</p>
                        <p class="text-sm text-gray-700">{{ $purchase->user->email }}</p>
                    </div>
                </div>

                <table class="w-full text-sm text-left border-t border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-4 py-2 border-b">#</th>
                            <th class="px-4 py-2 border-b">Nama Kelas</th>
                            <th class="px-4 py-2 border-b">Harga</th>
                            <th class="px-4 py-2 border-b">Qty</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr>
                            <td class="px-4 py-2 border-b">1</td>
                            <td class="px-4 py-2 border-b">{{ $purchase->course->name }}
                            </td>
                            <td class="px-4 py-2 border-b">Rp{{ number_format($purchase->course->price, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 border-b">1</td>
                        </tr>

                    </tbody>
                </table>

                <div class="mt-16 text-center text-gray-600">
                    <p>Terima kasih telah membeli kelas karya mentor.<br><strong>KelasQu.</strong></p>
                </div>

                <div class="mt-6 flex justify-center">
                    <button onclick="window.print()"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full transition">
                        Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
