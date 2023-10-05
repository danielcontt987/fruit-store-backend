<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaUser extends Model
{
    protected $fillable = [
        'area_id',
        'user_id',
    ];
}
