<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'code',
        'description',
        'images',
        'category',
        'stock',
        'berat',
        'size',
        'discount',
        'discount_price',
        'total_disc',
        'start_discount',
    ];

    public function getDiscountedPriceAttribute()
    {
        return $this->price - $this->discount_price;
    }
}