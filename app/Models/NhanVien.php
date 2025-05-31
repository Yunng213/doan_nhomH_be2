<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien';

    protected $fillable = ['TenNV', 'ChucVu', 'NgayNhanViec'];

    public $timestamps = false; // Vì bạn không có created_at / updated_at
}
