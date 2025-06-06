<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Kategori',
            'categories' => Category::latest()->paginate(10),
        ];
        return view('dashboard.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori',
        ];
        return view('dashboard.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Buat slug otomatis
            $validated['slug'] = Str::slug($validated['name']);

            // Cek dan simpan file ikon jika ada
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            }

            // Simpan kategori
            Category::create($validated);
        });

        return redirect()->route('categories.index')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data = [
            'title' => 'Edit Kategori',
            'category' => $category,
        ];
        return view('dashboard.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::transaction(function () use ($request, $category) {
            $validated = $request->validated();

            // Buat slug otomatis
            $validated['slug'] = Str::slug($validated['name']);

            // Cek dan simpan file ikon jika ada
            if ($request->hasFile('icon')) {
                // Hapus file lama jika ada
                if ($category->icon && Storage::disk('public')->exists($category->icon)) {
                    Storage::disk('public')->delete($category->icon);
                }

                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            }

            // Update kategori
            $category->update($validated);
        });

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Hapus icon dari storage jika ada
        if ($category->icon && Storage::disk('public')->exists($category->icon)) {
            Storage::disk('public')->delete($category->icon);
        }

        // Hapus data kategori dari database
        $category->delete();

        return redirect()->back()->with('delete', 'Kategori berhasil dihapus.');
    }
}
