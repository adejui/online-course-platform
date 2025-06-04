<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function registrationSuccess()
    {
        return view('auth.register-success', [
            'title' => 'Register Success'
        ]);
    }

    public function registerMentor(Request $request)
    {
        return view('auth.register-mentor', [
            'title' => 'Register Mentor'
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            // Dump isi validated setelah validasi
            // dd($validated);

            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $avatarPath;
            } else {
                $validated['avatar'] = 'images/default-avatar.png';
            }

            $validated['role'] = $validated['role'] ?? 'pelajar';
            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);

            // Login otomatis user yang baru daftar
            Auth::login($user);
        });

        return redirect()->route('register.success')->with('success', 'Data pelajar berhasil ditambahkan.');
    }

    public function storeMentor(StoreMentorRequest $request)
    {
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            // Dump isi validated setelah validasi
            // dd($validated);

            if ($request->hasFile('cv_file')) {
                $fileCvPath = $request->file('cv_file')->store('cv', 'public');
                $validated['cv_file'] = $fileCvPath;
            }

            $validated['user_id'] = Auth::id();
            $validated['status'] = $validated['status'] ?? 'pending';

            $mentor = Mentor::create($validated);
        });

        return redirect()->route('home')->with('success', 'Pendaftaran mentor berhasil!');
    }
}
