<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Phong',
                'email' => 'Phong248@gmail.com',
                'password' => bcrypt('12345678'), // Mã hóa mật khẩu
            ],
            [
                'name' => 'Dung',
                'email' => 'Judy213@gmail.com',
                'password' => bcrypt('12345678'), // Mã hóa mật khẩu
            ],
            [
                'name' => 'Quan',
                'email' => 'Quan23@gmail.com',
                'password' => bcrypt('12345678'), // Mã hóa mật khẩu
            ],
            [
                'name' => 'Khang',
                'email' => 'khang@gmail.com',
                'password' => bcrypt('12345678'), // Mã hóa mật khẩu
            ],
            [
                'name' => 'truong',
                'email' => 'truong@gmail.com',
                'password' => bcrypt('12345678'), // Mã hóa mật khẩu
            ],
             [
                'name' => 'spiderman',
                'email' => 'nhen@gmail.com',
                'password' => bcrypt('12345678'), // Mã hóa mật khẩu
            ],
        ]);
    }
}

