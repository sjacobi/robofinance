<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const STATUS_WAITING = 1;
    const STATUS_COMPLETED = 2;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'status',
        'transfer_time',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
