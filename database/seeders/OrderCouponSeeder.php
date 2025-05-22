<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_coupons')->insert([
            [
                'order_id' => 1,
                'coupon_id' => 1,
                'discount_applied' => 250, // Discount applied in currency
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'coupon_id' => 2,
                'discount_applied' => 0, // Free shipping coupon
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'coupon_id' => 3,
                'discount_applied' => 160, // Discount applied in currency
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}