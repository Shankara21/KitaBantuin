<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'name' => 'BRI',
                'slug' => 'bri',
                'account_number' => '1234567890',
                'account_name' => 'PT. Freelancer',
            ],
            [
                'name' => 'BNI',
                'slug' => 'bni',
                'account_number' => '1234567890',
                'account_name' => 'PT. Freelancer',
            ],
            [
                'name' => 'BCA',
                'slug' => 'bca',
                'account_number' => '1234567890',
                'account_name' => 'PT. Freelancer',
            ],
            [
                'name' => 'Mandiri',
                'slug' => 'mandiri',
                'account_number' => '1234567890',
                'account_name' => 'PT. Freelancer',
            ],
        ]);
    }
}
