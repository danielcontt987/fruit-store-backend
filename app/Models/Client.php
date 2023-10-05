<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'telephone',
        'image',
        'email',
        'curp',
        'rfc',
        'int',
        'ext',
        'status',
        'type_user',
        'colony_id',
        'business_id',
        'user_id',
    ];

    public function user() {
       return $this->belongsTo(User::class);
    }

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function colony() {
        return $this->belongsTo(Colony::class);
     }
}
