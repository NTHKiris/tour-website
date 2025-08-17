<?php

namespace App\Models;

use App\Notifications\PaymentConfirmation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

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
        'gateway_response' => 'array',
        'processed_at' => 'datetime',
    ];
    
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';
    const STATUS_REFUNDED = 'refunded';
    
    const PAYMENT_METHOD_VNPAY = 'vnpay';
    const PAYMENT_METHOD_MOMO = 'momo';
    const PAYMENT_METHOD_BANK_TRANSFER = 'bank_transfer';
    const PAYMENT_METHOD_CASH = 'cash';
    
    // Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    
    // Status helper methods
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }
    
    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }
    
    public function isFailed()
    {
        return $this->status === self::STATUS_FAILED;
    }
    
    public function markAsCompleted()
    {
        $this->status = self::STATUS_COMPLETED;
        $this->processed_at = now();
        $this->save();
        
        // Mark booking as completed if payment is successful
        if ($this->booking && $this->booking->isPending()) {
            $this->booking->markCompleted();
        }
        
        // Send email notification to the customer
        try {
            $user = $this->booking->user;
            if ($user && $user->email) {
                $user->notify(new PaymentConfirmation($this));
            }
        } catch (\Exception $e) {
            // Log error but don't fail the payment process
            \Log::error('Failed to send payment confirmation email: ' . $e->getMessage());
        }
    }
    
    public function markAsFailed($reason = null)
    {
        $this->status = self::STATUS_FAILED;
        $this->processed_at = now();
        if ($reason) {
            $this->gateway_response = array_merge($this->gateway_response ?? [], ['failure_reason' => $reason]);
        }
        $this->save();
    }
}
