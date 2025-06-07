<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoursePurchaseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\MentorCourseController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Kelola Mentor
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
    Route::get('/mentors/{mentor}', [MentorController::class, 'show'])->name('mentors.show');
    Route::post('mentors/{mentor}/accept', [MentorController::class, 'accept'])->name('mentors.accept');
    Route::post('mentors/{mentor}/reject', [MentorController::class, 'reject'])->name('mentors.reject');
    Route::delete('mentors/{mentor}', [MentorController::class, 'destroy'])->name('mentors.destroy');

    Route::resource('categories', CategoryController::class); //categories.index

    // Kelola konten Mentor
    Route::resource('mentor_courses', MentorCourseController::class); // mentor_courses.index
    Route::get('mentor_courses/course/{course}', [MentorCourseController::class, 'show_course'])->name('mentor_courses.show_course');
    Route::delete('mentor_courses/course/{course}', [MentorCourseController::class, 'destroy_course'])->name('mentor_courses.destroy_course');
    Route::delete('mentor_courses/video/{video}', [MentorCourseController::class, 'destroy_video'])->name('mentor_courses.destroy_video');

    Route::get('/course_purchases', [CoursePurchaseController::class, 'index'])->name('course_purchases.index');
    Route::get('/course_purchases/{mentor}', [CoursePurchaseController::class, 'show'])->name('course_purchases.show');
});

Route::middleware(['auth', 'role:mentor'])->group(function () {
    Route::resource('courses', CoursesController::class); // courses.index

    Route::get('/add/video/{course:id}', [CourseVideoController::class, 'create'])->name('courses.add_video');
    Route::post('/add/video/save/{course:id}', [CourseVideoController::class, 'store'])->name('courses.add_video.save');
    Route::resource('course_videos', CourseVideoController::class); // course_videos.index
});

Route::middleware(['auth', 'role:pelajar'])->group(function () {
    Route::get('/register/success', [RegisterController::class, 'registrationSuccess'])->name('register.success');
    Route::get('/register/mentor', [RegisterController::class, 'registerMentor'])->name('register.mentor');
    Route::post('/register/mentor', [RegisterController::class, 'storeMentor'])->name('register.mentor.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
