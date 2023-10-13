<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flight_id');
            $table->string('passenger_name');
            $table->string('passport_number');
			$table->integer('ticket_class_id');
            $table->date('booking_date');

            $table->foreign('flight_id')->references('id')->on('flights');

            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flight_bookings');
    }
}