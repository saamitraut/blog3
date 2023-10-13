<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
             $table->increments('id');
			 $table->string('first_name'); 
			 $table->string('last_name'); 
			 $table->string('email'); 
			 $table->string('phone_number'); 
			 $table->string('hire_date'); 
			 $table->string('job_id'); 
			 $table->integer('salary'); 
			 $table->integer('commision_pct'); 
			 $table->integer('manager_id'); 
			 $table->integer('department_id'); 
			 $table->boolean('status')->default(false);
			 $table->foreign('department_id')->references('id')->on('departments');
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
        Schema::dropIfExists('employees');
    }
}
