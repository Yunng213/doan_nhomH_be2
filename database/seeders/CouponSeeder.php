<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'code' => 'DISCOUNT10',
                'discount_percentage' => 10,
                'expiry_date' => now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FREESHIP',
                'discount_percentage' => 0,
                'expiry_date' => now()->addDays(15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SAVE20',
                'discount_percentage' => 20,
                'expiry_date' => now()->addDays(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}