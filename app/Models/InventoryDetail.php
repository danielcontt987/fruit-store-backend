<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryDetail extends Model
{
    protected $fillable = [
        'stock',
        'product_id',
        'inventory_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}
