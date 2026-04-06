<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo; // Import your Model here

class DemoController extends Controller
{
    /**
     * Show the demo booking form.
     */
    public function index()
    {
        return view('demo');
    }

    /**
     * Store a new demo request.
     */
    public function store(Request $request)
    {
        // 1. Validation 
        // Note: I added 'phone' since you included it in your Model's $fillable array
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:20', 
            'plan'    => 'required|in:basic,pro,enterprise',
            'message' => 'nullable|string|max:1000',
        ]);

        try {
            // 2. Save using Eloquent (Cleaner than DB::table)
            // This automatically handles created_at and updated_at
            Demo::create($validated);

            // 3. Success Redirect
            return back()->with('success', '🚀 Request received! We will contact you shortly.');

        } catch (\Exception $e) {
            // Log the error if needed: \Log::error($e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong. Please try again later.']);
        }
    }
}