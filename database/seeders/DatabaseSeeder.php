<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name' => 'Timur',
            'email' => 'timur@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'Admin'
        ]);
        Testimoni::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            SubCategorySeeder::class,
            SkillSeeder::class,
        ]);
    }
}
