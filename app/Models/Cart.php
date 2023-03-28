<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $items = [];
    public function addItem(int $id, string $name, float $price, int $quantity)
    {
        $this->items[] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
    protected $fillable = [

        'user_id',
        'images',
        'name',
        'quantity',
        'price',
        'berat',
        'total_quantity',
        'total',
        'total_berat'
    ];

    public function getItems(): array
    {
        return $this->items;
    }
    /**
     * Get the total price of the items in the cart.
     *
     * @return float
     */
    public function getTotalPrice(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
}