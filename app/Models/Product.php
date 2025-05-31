<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_quantity',
        'product_price',
        'product_detail',
        'product_image',
        'Promotion',
        'product_type',
        'type_name',
        'type_logo'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // Thêm cast nếu cần
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'product_type', 'id');
    }
}
