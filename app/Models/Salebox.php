<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salebox extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];
}
