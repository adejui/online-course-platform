<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Discussion;
use App\Models\CourseReview;
use Illuminate\Http\Request;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\StoreDiscussionRequest;

class FrontController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category', 'mentor'])->orderByDesc('id')->get();

        $categories = Category::all();

        return view('front.index', compact('courses', 'categories'));
    }

    public function category(Category $category)
    {
        // $courses = $category->courses()->get();
        $courses = $category->courses()
            ->with('coursePurchases')
            ->paginate(12);

        $userId = auth()->id();


        return view('front.category', compact('courses', 'category', 'userId'));
    }

    public function catalog()
    {
        // $courses = Course::paginate(12);
        // $courses = Course::with('coursePurchases')->inRandomOrder()->paginate(12);
        $courses = Course::with('coursePurchases')->paginate(12);
        $userId = auth()->id();

        return view('front.catalog', compact('courses', 'userId'));
    }

    public function my_course()
    {
        $user = Auth::user();

        // Ambil semua course_id dari pembelian user
        $purchasedCourseIds = $user->coursePurchases()->pluck('course_id');

        // Ambil semua data course yang dibeli
        $courses = Course::whereIn('id', $purchasedCourseIds)->paginate(9);

        return view('front.mycourse', compact('courses'));
    }

    public function my_transaction()
    {
        $user = Auth::user();

        // Ambil semua data pembelian kursus user + relasi ke Course
        $purchases = $user->coursePurchases()
            ->with('course') // eager loading agar ambil data kursus juga
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('front.mytransaction', compact('purchases'));
    }

    public function details(Course $course)
    {
        // $discussions = $course->discussions()->latest()->get();
        $allReviews = $course->courseReviews()->with('user')->latest()->get();
        $previewReviews = $allReviews->take(4);
        $discussions = Discussion::withCount('replies')
            ->whereNull('parent_id')
            ->latest()
            ->get();

        $user = Auth::user();
        $sudahBeli = false;

        if ($user) {
            $sudahBeli = CoursePurchase::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->whereIn('status', ['verified'])
                ->exists();
        }


        // $discussion = Discussion::with([
        //     'user',
        //     'replies.user'
        // ])->findOrFail($course->id);

        return view('front.details', compact('course', 'previewReviews', 'allReviews', 'discussions', 'sudahBeli'));
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
