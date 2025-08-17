<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'tour_id',
        'adults',
        'children',
        'participants',
        'tour_date',
        'total_amount',
        'status',
        'note',
    ];

    protected $casts = [
        'tour_date' => 'date',
        'total_amount' => 'decimal:2',
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
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
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
