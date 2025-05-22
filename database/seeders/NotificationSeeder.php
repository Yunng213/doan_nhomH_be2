<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'user_id' => 1,
                'message' => 'Your order #101 has been shipped.',
                'status' => 'unread',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'message' => 'Your payment for order #102 was successful.',
                'status' => 'read',
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'message' => 'Your order #103 has been cancelled.',
                'status' => 'unread',
                'created_at' => now(),
            ],
        ]);
    }
}