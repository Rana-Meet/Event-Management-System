<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::count();
        $bookings = Booking::count();

        
        return view('admin.dashboard', compact('events', 'bookings'));
    }
}
