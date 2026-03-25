<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash; // Added
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Models\User;    // Added
use App\Models\Booking; // Added

/*

|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [EventController::class, 'index']);

Route::get('/book', function () {
    return redirect('/');
});

Route::get('/book/{id}', [BookingController::class, 'create']);
Route::post('/book/{id}', [BookingController::class, 'store']);
Route::get('/ticket/{id}', [BookingController::class, 'ticket']);
Route::get('/download/{id}', [BookingController::class, 'download']);

/*

|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

// Admin Login Page
Route::get('/admin/login', function () {
    return view('admin.login');
});

// Admin Login Check
Route::post('/admin/login', function (Request $request) {
    if($request->email == "admin@gmail.com" && $request->password == "123456") {
        session(['admin' => true]);
        return redirect('/admin/dashboard');
    }
    return back()->with('error', 'Invalid Email or Password');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

// Create Event Page
Route::get('/admin/create', function () {
    if(!session('admin')) return redirect('/admin/login');
    return view('events.create');
});

// Store Event
Route::post('/admin/store', [EventController::class, 'store']);

/*

|--------------------------------------------------------------------------
| USER DASHBOARD / AUTH
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
})->name('dashboard');

Route::get('/settings', [EventController::class, 'settings']);
Route::get('/profile', [EventController::class, 'profile']);

// Show login page
Route::get('/login', function () {
    return view('events.login');
});

// Login check
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if($user && Hash::check($request->password, $user->password))
    {
        session(['user_id' => $user->id]);
        // Redirect to the defined route below
        return redirect('/mybookings'); 
    }

    return back()->with('error', 'Invalid login details');  
});

// Show user bookings
Route::get('/mybookings', function () {
    if(!session('user_id')) return redirect('/login');

    $bookings = Booking::with('event')
                ->where('user_id', session('user_id'))
                ->get();

    // Ensure this view exists at resources/views/events/mybook.blade.php
    // If your file is named mybook.blade.php, use 'events.mybook'
    return view('events.mybook', compact('bookings'));
});
