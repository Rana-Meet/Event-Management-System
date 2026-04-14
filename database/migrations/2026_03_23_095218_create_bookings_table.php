<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('event_id')->constrained()->onDelete('cascade');
        
        // --- ADD THESE FOR RAZORPAY ---
        $table->decimal('amount', 10, 2); // To store the price paid
        $table->string('razorpay_payment_id')->nullable(); // The unique ID from Razorpay
        $table->string('razorpay_order_id')->nullable();   // The Order ID we created
        $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
        
        // ------------------------------

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
