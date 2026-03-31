<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking; // 1. Added this import

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function settings(){
        return view('events.settings');
    }

    public function mybookings(){
        // 2. Fetch the bookings and pass them to the view
        // Using auth()->id() ensures the user only sees their own bookings
        $bookings = Booking::where('user_id', auth()->id())->get();
        
        return view('events.mybook', compact('bookings'));
    }

    public function profile(){
        return view('events.profile');
    }

    public function login(){
        return view('events.login');
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Event::create([
            'title'=>$request->title,
            'description'=>$request->description,   
            'date'=>$request->date,
            'location'=>$request->location,
            'price'=>$request->price,
            'image'=>$imageName
        ]);

        return redirect('/');
    }
}
