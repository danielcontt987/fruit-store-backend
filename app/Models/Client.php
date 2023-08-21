<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'user_id',
        'status',
        'email',
    ];

    public function user() {
        $this->belongsTo(User::class);
    }
}
