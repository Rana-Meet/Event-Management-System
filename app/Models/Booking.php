<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    // Important: Allows these fields to be saved to the database
    // App\Models\Booking.php
        protected $fillable = ['user_id', 'event_id', 'amount', 'razorpay_payment_id', 'status'];

    /**
     * Get the user that owns the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the event associated with the booking.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
