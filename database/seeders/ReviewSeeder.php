<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'product_id' => 101,
                'user_id' => 1,
                'rating' => 5,
                'comment' => 'Amazing product! Highly recommend.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 102,
                'user_id' => 2,
                'rating' => 4,
                'comment' => 'Good quality, but a bit expensive.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 103,
                'user_id' => 3,
                'rating' => 3,
                'comment' => 'Average product, could be better.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}