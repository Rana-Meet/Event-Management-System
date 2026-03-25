<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketCodeToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('ticket_code')->after('event_id')->nullable();
    });
}

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('ticket_code');
        });
    }
}
