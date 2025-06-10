<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function details(Course $course)
    {
        return view('front.details', compact('course'));
    }
}
