<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BankUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_users')->insert([
            [
                'name' => 'Shopeepay',
                'slug' => 'shopeepay',
                'image' => 'img/payments/Shopeepay.png',
            ],
            [
                'name' => 'Linkaja',
                'slug' => 'linkaja',
                'image' => 'img/payments/LinkAja.png',
            ],
            [
                'name' => 'Gopay',
                'slug' => 'gopay',
                'image' => 'img/payments/Gopay.png',
            ],
            [
                'name' => 'BCA',
                'slug' => 'bca',
                'image' => 'img/payments/BCA.png',
            ],
            [
                'name' => 'BRI',
                'slug' => 'bri',
                'image' => 'img/payments/BRI.png',
            ],
            [
                'name' => 'Mandiri',
                'slug' => 'mandiri',
                'image' => 'img/payments/Mandiri.png',
            ],
        ]);
    }
}
