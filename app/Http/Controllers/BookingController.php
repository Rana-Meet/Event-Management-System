<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    // SHOW BOOK FORM
    public function create($id)
    {
        $event = Event::findOrFail($id);
        return view('book', compact('event'));
    }

    // STORE BOOKING
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // FIX: Find the user if they already exist, otherwise create them.
        // This prevents the "Duplicate entry for users_email_unique" error.
        $user = User::firstOrCreate(
            ['email' => $request->email], // Look for this email
            [
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ]
        );

        // GENERATE CODE
        $code = 'EVM-' . strtoupper(uniqid());

        // CREATE BOOKING
        $booking = Booking::create([
            'user_id' => $user->id,
            'event_id' => $id,
            'ticket_code' => $code
        ]);

        return redirect('/ticket/'.$booking->id);
    }

    // SHOW TICKET PAGE
    public function ticket($id)
    {
        // Ensure relationships are loaded
        $booking = Booking::with(['event', 'user'])->findOrFail($id);
        return view('ticket', compact('booking'));
    }
    public function login(){
        return view('events.login');
    }
    // DOWNLOAD PDF
    public function download($id)
    {
        $booking = Booking::with(['event', 'user'])->findOrFail($id);

        // Load the ticket view into DomPDF
        $pdf = Pdf::loadView('ticket', compact('booking'));

        // Return the PDF for download with a unique filename
        return $pdf->download('Ticket-'.$booking->ticket_code.'.pdf');
    }
}
    