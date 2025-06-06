<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Kelas',
            'courses' => Course::latest()->paginate(10),
        ];
        return view('dashboard.courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Kelas',
            'categories' => Category::all(),
        ];
        return view('dashboard.courses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Buat slug otomatis
            $validated['slug'] = Str::slug($validated['name']);
            $validated['mentor_id'] = Auth::id();

            // Cek dan simpan file thumbnail jika ada
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Simpan kategori
            Course::create($validated);
        });

        return redirect()->route('courses.index')->with('success', 'Kelas baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $data = [
            'title' => 'Detail Kelas',
            'course' => $course,
            'courseVideos' => $course->courseVideos()->oldest()->paginate(5),
        ];
        return view('dashboard.courses.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $data = [
            'title' => 'Edit Kelas',
            'course' => $course,
            'categories' => Category::all(),
        ];
        return view('dashboard.courses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        // dd($request->all());
        DB::transaction(function () use ($request, $course) {
            $validated = $request->validated();

            // Buat slug otomatis
            $validated['slug'] = Str::slug($validated['name']);
            $validated['mentor_id'] = Auth::id();

            // Cek dan simpan file ikon jika ada
            if ($request->hasFile('thumbnail')) {
                // Hapus file lama jika ada
                if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
                    Storage::disk('public')->delete($course->thumbnail);
                }

                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Update kategori
            $course->update($validated);
        });

        return redirect()->route('courses.show', $course)->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->back()->with('delete', 'Kelas berhasil dihapus.');
    }
}
