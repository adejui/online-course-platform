<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $coursesQuery = Course::query();

        $mentor = Mentor::where('user_id', $user->id)->first();
        if ($user->role === 'mentor') {
            $coursesQuery->whereHas('mentor', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
            $pelajar = CoursePurchase::whereIn('course_id', $coursesQuery->select('id'))
                ->distinct('user_id')
                ->count('user_id');
        } else {
            $pelajar = CoursePurchase::distinct('user_id')->count('user_id');
        }

        if ($user->role === 'mentor') {
            $mentor = Mentor::where('user_id', $user->id)->first();
            if ($mentor) {
                $transaction = CoursePurchase::where('mentor_id', $mentor->id)->get();
            }
        } elseif ($user->role === 'admin') {
            $transaction = CoursePurchase::all(); // Admin lihat semua transaksi
        }

        $data = [
            'courses' => $coursesQuery->count(),
            'users' => $pelajar,
            'title' => 'Dashboard',
            'category' => Category::all(),
            'course' => Course::all(),
            'mentor' => User::where('role', 'mentor')->get(),
            'transaction' => $transaction,
            'user' => User::where('role', 'pelajar')->get(),
        ];

        return view('dashboard.index', $data);
    }
}
