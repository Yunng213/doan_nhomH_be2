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
}
