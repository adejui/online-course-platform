<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoursePurchaseController extends Controller
{
    public function index()
    {
        // dd(CoursePurchase::all());
        $mentors = Mentor::with('user')
            ->has('courses')
            ->withCount('courses')
            ->withCount('coursePurchases as total_pembelian')   // hitung jumlah pembelian
            ->withSum('coursePurchases as total_penjualan', 'total_paid')  // jumlah total_paid
            ->paginate(10);

        $data = [
            'title' => 'Transaksi',
            'mentors' => $mentors,
        ];
        return view('dashboard.course_purchases.index', $data);
    }

    public function show(Mentor $mentor)
    {
        // dd($mentor->id);

        // Ambil data course dengan pagination
        $courses = Course::withCount([
            'coursePurchases as total_pembelian',
            'coursePurchases as total_penjualan' => fn($q) => $q->select(DB::raw('COALESCE(SUM(total_paid), 0)')),
        ])
            ->where('mentor_id', $mentor->id)
            ->orderByDesc('total_pembelian')
            ->paginate(10); // bisa ubah sesuai kebutuhan

        // Total semua transaksi dari semua course (tanpa pagination)
        $globalTotals = Course::where('mentor_id', $mentor->id)
            ->withCount([
                'coursePurchases as total_pembelian' => fn($q) => $q->select(DB::raw('COUNT(*)')),
                'coursePurchases as total_penjualan' => fn($q) => $q->select(DB::raw('COALESCE(SUM(total_paid), 0)')),
            ])
            ->get();

        $total_pembelian_all = $globalTotals->sum('total_pembelian');
        $total_penjualan_all = $globalTotals->sum('total_penjualan');

        // Total hanya dari halaman saat ini
        $total_pembelian_page = $courses->sum('total_pembelian');
        $total_penjualan_page = $courses->sum('total_penjualan');

        return view('dashboard.course_purchases.detail', [
            'title' => 'Detail Transaksi',
            'courses' => $courses,
            'total_pembelian_all' => $total_pembelian_all,
            'total_penjualan_all' => $total_penjualan_all,
            'total_pembelian_page' => $total_pembelian_page,
            'total_penjualan_page' => $total_penjualan_page,
        ]);
    }

    public function mentor_index()
    {
        $user = Auth::user();

        // Pastikan hanya role mentor yang bisa akses ini
        if ($user->role !== 'mentor') {
            abort(403, 'Hanya mentor yang bisa mengakses halaman ini.');
        }

        // Ambil data mentor berdasarkan user_id
        $mentor = Mentor::where('user_id', $user->id)->firstOrFail();

        // Ambil daftar course mentor dengan pagination + hitung pembelian dan penjualan per course
        $courses = Course::withCount([
            'coursePurchases as total_pembelian',
            'coursePurchases as total_penjualan' => fn($q) => $q->select(DB::raw('COALESCE(SUM(total_paid), 0)')),
        ])
            ->where('mentor_id', $mentor->id)
            ->orderByDesc('total_pembelian')
            ->paginate(10); // bisa ubah sesuai kebutuhan

        // Total seluruh transaksi semua course milik mentor (tanpa pagination)
        $globalTotals = Course::where('mentor_id', $mentor->id)
            ->withCount([
                'coursePurchases as total_pembelian' => fn($q) => $q->select(DB::raw('COUNT(*)')),
                'coursePurchases as total_penjualan' => fn($q) => $q->select(DB::raw('COALESCE(SUM(total_paid), 0)')),
            ])
            ->get();

        $total_pembelian_all = $globalTotals->sum('total_pembelian');
        $total_penjualan_all = $globalTotals->sum('total_penjualan');

        // Total dari halaman saat ini (pagination)
        $total_pembelian_page = $courses->sum('total_pembelian');
        $total_penjualan_page = $courses->sum('total_penjualan');

        return view('dashboard.course_purchases.mentor_index', [
            'title' => 'Transaksi',
            'courses' => $courses,
            'total_pembelian_all' => $total_pembelian_all,
            'total_penjualan_all' => $total_penjualan_all,
            'total_pembelian_page' => $total_pembelian_page,
            'total_penjualan_page' => $total_penjualan_page,
        ]);
    }
}
