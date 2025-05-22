<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'user_id' => 1,
                'method' => 'credit_card',
                'details' => 'Visa ending in 1234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'method' => 'paypal',
                'details' => 'user2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'method' => 'bank_transfer',
                'details' => 'Bank Account: 987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}