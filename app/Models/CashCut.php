<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashCut extends Model
{
    protected $fillable = [
        'amount',
        'current',
        'current_mount',
        'difference',
        'little_box',
        'observations',
        'folio',
        'real_cash',
        'real_card',
        'real_check',
        'real_transfer',
        'total_accumulator',
        'date_opening',
        'date_close',
        'user_id',
        'salebox_id',
        'business_id',
    ];

    public function salebox()
    {
        return $this->belongsTo(Salebox::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
