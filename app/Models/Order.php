<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'alamat',
        'id_produk',
        'nama_produk',
        'jumlah',
        'harga',
        'size',
        'shipping',
        'shipping_cost',
        'code',
        'subtotal',
        'totalprice',
        'status',
    ];
}