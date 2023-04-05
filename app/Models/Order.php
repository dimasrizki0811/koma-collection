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
        'nama_produk',
        'jumlah',
        'harga',
        'size',
        'shipping',
        'code',
        'cost',
        'totalprice',
        'status',
    ];
}