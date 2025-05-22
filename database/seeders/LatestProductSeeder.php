<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LatestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('latest_products')->insert([
            [
                'name' => 'Samsung Galaxy S24',
                'description' => 'The latest Samsung flagship smartphone.',
                'price' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'iPhone 15',
                'description' => 'The newest iPhone with advanced features.',
                'price' => 1300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MacBook Air 13',
                'description' => 'Lightweight and powerful laptop from Apple.',
                'price' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Xiaomi 14',
                'description' => 'Affordable smartphone with premium features.',
                'price' => 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}