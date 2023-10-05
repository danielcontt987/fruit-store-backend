<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'folio',
        'name',
        'business_id',
        'user_id',
    ];

    public function business() 
    {
        return $this->belongsTo(Business::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
