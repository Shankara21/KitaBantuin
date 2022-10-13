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
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Website Programming',
            'Mobile Programming',
            'UI/UX',
            'Cyber Security',
            'Desktop Programming',
            'Game Programming',
            'SEO & Website Maintenance'
        ]);
        $categories->each(function ($category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        });
    }
}
