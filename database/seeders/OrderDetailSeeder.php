<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            [
                'order_id' => 1,
                'product_id' => 101,
                'quantity' => 2,
                'price' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'product_id' => 102,
                'quantity' => 1,
                'price' => 1300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'product_id' => 103,
                'quantity' => 1,
                'price' => 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}