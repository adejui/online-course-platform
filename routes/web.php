<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware(['auth', 'role:pelajar'])->group(function () {
    Route::get('/register/success', [RegisterController::class, 'registrationSuccess'])->name('register.success');
    Route::get('/register/mentor', [RegisterController::class, 'registerMentor'])->name('register.mentor');
    Route::post('/register/mentor', [RegisterController::class, 'storeMentor'])->name('register.mentor.store');
});

Route::middleware(['auth'])->group(function () {
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});
