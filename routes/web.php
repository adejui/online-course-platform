<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MentorController;

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
