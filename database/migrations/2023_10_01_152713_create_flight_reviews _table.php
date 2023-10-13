<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('flight_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flight_id');
            $table->integer('user_id');
            $table->integer('rating');
            $table->string('review');
            $table->string('recommendation');

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('flight_id')->references('id')->on('flights');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flight_reviews');
    }
}