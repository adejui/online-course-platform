<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pengembangan Diri',
                'icon' => 'fas fa-user-graduate',
            ],
            [
                'name' => 'Teknologi & Pemrograman',
                'icon' => 'fas fa-code',
            ],
            [
                'name' => 'Desain & Kreativitas',
                'icon' => 'fas fa-paint-brush',
            ],
            [
                'name' => 'Bahasa Asing',
                'icon' => 'fas fa-language',
            ],
            [
                'name' => 'Kesehatan & Kebugaran',
                'icon' => 'fas fa-heartbeat',
            ],
            [
                'name' => 'Bisnis & Kewirausahaan',
                'icon' => 'fas fa-briefcase',
            ],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'icon' => $cat['icon'],
            ]);
        }
    }
}
