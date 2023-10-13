<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountrysTable extends Migration
{
    public function up()
    {
        Schema::create('countrys', function (Blueprint $table) {
            $table->increments('id');
			 $table->string('country_name'); 
			 $table->integer('region_id')->unsigned(); 
			 $table->boolean('status')->default(false);
            $table->timestamps();
			
			$table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countrys');
    }
}
