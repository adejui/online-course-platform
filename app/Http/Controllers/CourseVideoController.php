<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\StoreCourseVideoRequest;
use App\Http\Requests\UpdateCourseVideoRequest;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $data = [
            'title' => 'Tambah Video Materi',
            'course' => $course,
        ];
        return view('dashboard.course_videos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseVideoRequest $request, Course $course)
    {
        // dd($request->all());
        DB::transaction(function () use ($request, $course) {
            $validated = $request->validated();

            $validated['course_id'] = $course->id;

            CourseVideo::create($validated);
        });

        return redirect()->route('courses.show', $course)->with('success', 'Video Materi baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseVideo $courseVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseVideo $courseVideo)
    {
        $data = [
            'title' => 'Edit Video Materi',
            'courseVideo' => $courseVideo,
        ];
        return view('dashboard.course_videos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseVideoRequest $request, CourseVideo $courseVideo)
    {
        // dd($request->all());
        DB::transaction(function () use ($request, $courseVideo) {
            $validated = $request->validated();

            $validated['course_id'] = $courseVideo->course->id;

            $courseVideo->update($validated);
        });

        return redirect()->route('courses.show', $courseVideo->course->id)->with('success', 'Video Materi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseVideo $courseVideo)
    {
        $courseVideo->delete();

        return redirect()->to(URL::previous())->with('delete', 'Video Materi berhasil dihapus.');
    }
}
