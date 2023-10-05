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
}
