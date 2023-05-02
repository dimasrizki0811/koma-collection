<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'name', 'quantity', 'price', 'images', 'size', 'berat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeQuantityWhislist($query, $id)
    {
        $data = collect($query->where('user_id', $id)->get());
        return [
            "quantity"  => $data->sum('quantity'),
            "berat"     => $data->sum('berat'),
            "price"     => $data->sum('price'),
        ];
    }
}
