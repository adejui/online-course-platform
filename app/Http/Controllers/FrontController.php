<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscussionRequest;
use App\Models\Course;
use App\Models\CourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Discussion;

class FrontController extends Controller
{
    public function details(Course $course)
    {
        // $discussions = $course->discussions()->latest()->get();
        $allReviews = $course->courseReviews()->with('user')->latest()->get();
        $previewReviews = $allReviews->take(4);
        $discussions = Discussion::withCount('replies')
            ->whereNull('parent_id')
            ->latest()
            ->get();

        // $discussion = Discussion::with([
        //     'user',
        //     'replies.user'
        // ])->findOrFail($course->id);



        return view('front.details', compact('course', 'previewReviews', 'allReviews', 'discussions'));
    }

    public function checkout(Course $course)
    {
        $user = Auth::user();

        return view('front.checkout', compact('course'));
    }

    public function learning(Course $course, $courseVideoId)
    {
        $video = $course->courseVideos->firstWhere('id', $courseVideoId);

        $allReviews = $course->courseReviews()->with('user')->latest()->get();
        $previewReviews = $allReviews->take(4);
        $discussions = Discussion::withCount('replies')
            ->whereNull('parent_id')
            ->latest()
            ->get();

        return view('front.learning', compact('course', 'video', 'previewReviews', 'allReviews', 'discussions'));
    }

    public function review(StoreReviewRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $course = Course::findOrFail($request->course_id);
            // dd($course);

            $user = Auth::user();

            $validated['course_id'] = $course->id;
            $validated['user_id'] = $user->id;

            CourseReview::create($validated);
        });

        return redirect()->to(URL::previous())->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function discussion(StoreDiscussionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $course = Course::findOrFail($request->course_id);
            $user = Auth::user();

            $validated['course_id'] = $course->id;
            $validated['user_id'] = $user->id;

            $validated['parent_id'] = $request->parent_id ?? null;

            Discussion::create($validated);
        });

        return redirect()->to(URL::previous())->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function getDetail($id)
    {
        $discussion = Discussion::with([
            'user',
            'replies.user'
        ])->findOrFail($id);

        return response()->json($discussion);
    }
}
