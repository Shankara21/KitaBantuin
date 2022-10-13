<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = collect([
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
        $skill->each(function ($skill) {
            Skill::create([
                'name' => $skill,
                'slug' => Str::slug($skill)
            ]);
        });
    }
    }

