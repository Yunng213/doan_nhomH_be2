<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhan_vien')->insert([
            [
                'TenNV' => 'Phong',
                'ChucVu' => 'coder',
                'NgayNhanViec' => '2023-10-01',
            ],
            [
                'TenNV' => 'Dung',
                'ChucVu' => 'designer',
                'NgayNhanViec' => '2023-10-02',
            ],
            [
                'TenNV' => 'Quan',
                'ChucVu' => 'manager',
                'NgayNhanViec' => '2023-10-03',
            ],
            [
                'TenNV' => 'Khang',
                'ChucVu' => 'tester',
                'NgayNhanViec' => '2023-10-04',
            ],
            [
                'TenNV' => 'Truong',
                'ChucVu' => 'admin',
                'NgayNhanViec' => '2023-10-05',
            ],
            [
                'TenNV' => 'Spiderman',
                'ChucVu' => 'superhero',
                'NgayNhanViec' => '2023-10-06',
            ],
        ]);
    }
}
