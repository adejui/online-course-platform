<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'category' => Category::all(),
            'course' => Course::all(),
            'mentor' => Mentor::all(),
            'transaction' => CoursePurchase::all(),
            'user' => User::whereDoesntHave('mentor')->get(),
        ];
        return view('dashboard.index', $data);
    }
}
