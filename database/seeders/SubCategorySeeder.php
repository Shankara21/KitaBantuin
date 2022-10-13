<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Php',
            'Java',
            'JavaScript',
            'Html',
            'Laravel',
            'Code Igniter',
            'React Js',
            'Angular Js',
            'Vue Js',
            'Node Js',
            'Python',
            'Express Js',
            'Next Js',
            'Nuxt Js',
            'Flutter',
            'Dart',
            'Kotlin',
            'C++',
            'C',
        ]);
        // $categories->each(function ($category) {
        //     SubCategory::create([
        //         'name' => $category,
        //         'slug' => Str::slug($category)
        //     ]);
        // });

        DB::table('sub_categories')->insert([
            [
                'name' => 'Php',
                'slug' => 'php',
                'category_id' => 1
            ],
            [
                'name' => 'Java',
                'slug' => 'java',
                'category_id' => 1
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'category_id' => 1
            ],
            [
                'name' => 'Html',
                'slug' => 'html',
                'category_id' => 1
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'category_id' => 1
            ],
            [
                'name' => 'Code Igniter',
                'slug' => 'code-igniter',
                'category_id' => 1
            ],
            [
                'name' => 'React Js',
                'slug' => 'react-js',
                'category_id' => 1
            ],
            [
                'name' => 'Angular Js',
                'slug' => 'angular-js',
                'category_id' => 1
            ],
            [
                'name' => 'Vue Js',
                'slug' => 'vue-js',
                'category_id' => 1
            ],
            [
                'name' => 'Node Js',
                'slug' => 'node-js',
                'category_id' => 1
            ],
            [
                'name' => 'Express Js',
                'slug' => 'express-js',
                'category_id' => 1
            ],
            [
                'name' => 'Next Js',
                'slug' => 'next-js',
                'category_id' => 1
            ],
            [
                'name' => 'Nuxt Js',
                'slug' => 'nuxt-js',
                'category_id' => 1
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
                'category_id' => 1
            ],
            [
                'name' => 'Flutter',
                'slug' => 'flutter',
                'category_id' => 2
            ],
            [
                'name' => 'Dart',
                'slug' => 'dart',
                'category_id' => 2
            ],
            [
                'name' => 'Kotlin',
                'slug' => 'kotlin',
                'category_id' => 2
            ],
            [
                'name' => 'Figma',
                'slug' => 'figma',
                'category_id' => 2
            ],
            [
                'name' => 'Go lang',
                'slug' => 'go-lang',
                'category_id' => 7
            ],
        ]);
    }
}
