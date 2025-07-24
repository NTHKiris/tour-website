<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'tour_id',
        'participants',
        'tour_date',
        'total_amount',
        'status',
        'note',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function markCompleted()
    {
        $this->status = self::STATUS_COMPLETED;
        $this->save();
    }

    public function markCancelled()
    {
        $this->status = self::STATUS_CANCELLED;
        $this->save();
    }

    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;

    }
}
