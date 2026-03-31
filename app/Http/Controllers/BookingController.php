<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;

class BookingController extends Controller
{
    // SHOW BOOK FORM
    public function create($id)
    {
        $event = Event::findOrFail($id);
        return view('book', compact('event'));
    }

    // STORE DATA IN SESSION
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        session([
            'booking_data' => $request->only('name','email','password'),
            'event_id' => $id
        ]);

        return redirect('/payment');
    }

    // SHOW PAYMENT PAGE
    public function payment()
    {
        return view('events.payment');
    }

    // AFTER PAYMENT SUCCESS
    public function paymentScreen()
    {
        $data = session('booking_data');
        $event_id = session('event_id');

        if(!$data || !$event_id){
            return redirect('/')->with('error','Session expired');
        }

        // Create or find user
        $user = User::firstOrCreate(
            ['email' => $data['email']],
            [
                'name' => $data['name'],
                'password' => bcrypt($data['password']),
            ]
        );

        // Generate code
        $code = 'EVM-' . strtoupper(uniqid());

        // Create booking
        $booking = Booking::create([
            'user_id' => $user->id,
            'event_id' => $event_id,
            'ticket_code' => $code,
        ]);

        // Clear session
        session()->forget(['booking_data', 'event_id']);

        return redirect('/ticket/'.$booking->id);
    }

    // SHOW TICKET
    public function ticket($id)
    {
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

        $pdf = Pdf::loadView('ticket', compact('booking'));

        return $pdf->download('Ticket-'.$booking->ticket_code.'.pdf');
    }
    public function sendTicket($id)
    {
        $booking = Booking::with(['event','user'])->findOrFail($id);

        Mail::to($booking->user->email)->send(new TicketMail($booking));

        return back()->with('success', 'Ticket sent to your email!');
    }
}