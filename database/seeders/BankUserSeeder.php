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
                'image' => 'img/payments/shopeepay.png',
            ],
            [
                'name' => 'Linkaja',
                'slug' => 'linkaja',
                'image' => 'img/payments/linkaja.png',
            ],
            [
                'name' => 'Gopay',
                'slug' => 'gopay',
                'image' => 'img/payments/gopay.png',
            ],
            [
                'name' => 'BCA',
                'slug' => 'bca',
                'image' => 'img/payments/bca.png',
            ],
            [
                'name' => 'BRI',
                'slug' => 'bri',
                'image' => 'img/payments/bri.png',
            ],
            [
                'name' => 'Mandiri',
                'slug' => 'mandiri',
                'image' => 'img/payments/mandiri.png',
            ],
        ]);
    }
}
