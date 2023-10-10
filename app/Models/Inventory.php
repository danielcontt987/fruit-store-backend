<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'name',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
