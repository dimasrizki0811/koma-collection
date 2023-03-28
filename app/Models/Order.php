<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'country',
        'origin',
        'name',
        'phone_number',
        'address',
        'kecamatan',
        'city',
        'province',
        'destination',
        'product_id',
        'user_id',
        'quantity',
        'berat',
        'total',
        'delivery',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}