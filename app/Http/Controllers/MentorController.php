<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Mentors',
            'mentors' => Mentor::with('user')->where('status', 'approved')->latest()->paginate(10, ['*'], 'mentor_page'),
            'candidateMentors' => Mentor::with('user')->where('status', 'pending')->oldest()->paginate(10, ['*'], 'candidate_page'),
        ];
        return view('dashboard.mentors.index', $data);
    }

    public function accept($mentor)
    {
        // dd($mentor);
        $mentor = Mentor::findOrFail($mentor);

        $mentor->update(['status' => 'approved']);

        $mentor->user->update(['role' => 'mentor']);

        return redirect()->back()->with('success', 'Mentor ' . $mentor->user->name . ' Berhasil diACC.');
    }

    public function reject($mentor)
    {
        $mentor = Mentor::findOrFail($mentor);

        // Hapus file CV dari storage jika ada
        if ($mentor->cv_file && Storage::disk('public')->exists($mentor->cv_file)) {
            Storage::disk('public')->delete($mentor->cv_file);
        }

        // Update status ke 'rejected'
        $mentor->update(['status' => 'rejected', 'cv_path' => null]); // opsional: set null agar data bersih

        return redirect()->back()->with('reject', 'Mentor ' . $mentor->user->name . ' Berhasil ditolak.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mentor $mentor)
    {
        // dd($mentor);
        $data = [
            'title' => 'Detail Mentor',
            'mentor' => Mentor::with('user')->where('id', $mentor->id)->first(),

            // 'mentor' => Mentor::with('user')->where('id', $mentor->id),
        ];
        return view('dashboard.mentors.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentor $mentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mentor $mentor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentor $mentor)
    {
        $mentor = Mentor::findOrFail($mentor->id);

        // Hapus file CV dari storage jika ada
        if ($mentor->cv_file && Storage::disk('public')->exists($mentor->cv_file)) {
            Storage::disk('public')->delete($mentor->cv_file);
        }

        // Hapus avatar user jika bukan default
        // $avatarPath = $mentor->user->avatar;
        // if ($avatarPath !== 'avatars/default-avatar.png' && Storage::disk('public')->exists($avatarPath)) {
        //     Storage::disk('public')->delete($avatarPath);
        // }

        // Ubah role user menjadi pelajar
        $mentor->user->update([
            'role' => 'pelajar',
        ]);

        $mentor->delete();

        return redirect()->back()->with('delete', 'Mentor ' . $mentor->user->name . ' Berhasil dihapus.');
    }
}
