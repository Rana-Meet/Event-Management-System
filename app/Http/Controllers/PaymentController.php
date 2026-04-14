<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        // Use the keys from your .env file
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $orderData = [
            'receipt'         => 'rcpt_' . time(),
            'amount'          => 499 * 100, // ₹499.00 in paise
            'currency'        => 'INR',
            'payment_capture' => 1 
        ];

        try {
            $razorpayOrder = $api->order->create($orderData);

            // CHANGED: Match your actual Blade file path
            return view('events.payment', [
                'orderId' => $razorpayOrder['id'],
                'amount'  => $orderData['amount'],
            ]);
        } catch (Exception $e) {
            return "Error creating order: " . $e->getMessage();
        }
    }

    public function verifyPayment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        try {
            // 1. Verify Signature (Security Check)
            $attributes = [
                'razorpay_order_id' => $input['razorpay_order_id'],
                'razorpay_payment_id' => $input['razorpay_payment_id'],
                'razorpay_signature' => $input['razorpay_signature']
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // 2. Save to Database (Matching your migration columns)
            Booking::create([
                'user_id' => session('user_id') ?? 1, // Get ID from session, default to 1 for testing
                'event_id' => 1, // Replace with dynamic event ID if needed
                'amount' => 499.00,
                'razorpay_payment_id' => $input['razorpay_payment_id'],
                'status' => 'completed'
            ]);
            
            return redirect('/mybookings')->with('success', 'Payment Successful!');

        } catch (Exception $e) {
            // Log error for debugging
            return redirect('/payment')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}