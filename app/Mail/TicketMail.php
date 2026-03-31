<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TicketMail extends Mailable
{
    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->subject('Your Event Ticket 🎟️')
                    ->view('emails.ticket');
    }
}