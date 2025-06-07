<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class MentorCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Konten Mentor',
            'courses' => Course::latest()->paginate(10),

        ];
        return view('dashboard.mentor_courses.index', $data);
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
    public function show(String $id)
    {
        $course = Course::with('mentor', 'category')->findOrFail($id);

        $data = [
            'title' => 'Detail Kelas',
            'course' => $course,
            'courseVideos' => $course->courseVideos()->oldest()->paginate(5),
        ];

        return view('dashboard.mentor_courses.detail', $data);
    }

    public function show_course(String $id)
    {
        $course = Course::with('mentor', 'category')->findOrFail($id);

        $data = [
            'title' => 'Detail Kelas',
            'course' => $course,
        ];

        return view('dashboard.mentor_courses.detail_kelas', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_course(string $id)
    {
        $course = Course::findOrFail($id);

        if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->back()->with('delete', 'Kelas berhasil dihapus.');
    }

    public function destroy_video(string $id)
    {
        $courseVideo = CourseVideo::findOrFail($id);

        $courseVideo->delete();

        return redirect()->to(URL::previous())->with('delete', 'Video Materi berhasil dihapus.');
    }
}
