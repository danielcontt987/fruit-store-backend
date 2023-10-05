<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colony extends Model
{
    protected $fillable = [
        'zipcode',
        'name',
        'municipality',
        'state',
    ];
}
