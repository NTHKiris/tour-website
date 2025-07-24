<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status',
        'gateway_response',
        'processed_at',
    ];
    protected $casts = [
        'gateway_response' => 'array'
    ];
}
