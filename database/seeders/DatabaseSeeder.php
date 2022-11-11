<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Testimoni;
use App\Models\User;
use App\Models\WorkerDetail;
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
            'role' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'Firgi',
            'email' => 'firgi@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'Admin'
        ]);
        User::factory()->create([
            'name' => 'Worker',
            'email' => 'worker@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'Worker'
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'User'
        ]);

        Testimoni::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            SubCategorySeeder::class,
            SkillSeeder::class,
        ]);
        WorkerDetail::factory()->create([
            'user_id' => 3,
            'skill' => "Php",
            'status' => 'Accepted'
        ]);
    }
}
