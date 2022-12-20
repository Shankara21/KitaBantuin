<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bid;
use App\Models\Portofolio;
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
            'name' => 'Judha',
            'email' => 'judha@gmail.com',
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
            BankUserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            SkillSeeder::class,
            BankSeeder::class,
            ProjectSeeder::class,
        ]);
        WorkerDetail::factory()->create([
            'user_id' => 4,
            'skill' => "Php",
            'status' => 'Accepted',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
        ]);
        Portofolio::factory()->create([
            'worker_details_id' => 1,
            'title' => 'Gorent',

            'link' => 'http://gorent.herokuapp.com/',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
        ]);
        WorkerDetail::factory()->create([
            'user_id' => 5,
            'skill' => "Php",
            'status' => 'Pending',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
        ]);
        Bid::factory()->create([
            'user_id' => 3,
            'project_id' => 1,
            'price' => 100000,
            'deadline' => '2022-10-10',
        ]);
    }
}
