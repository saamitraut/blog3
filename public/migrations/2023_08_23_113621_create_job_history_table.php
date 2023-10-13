<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('job_history', function (Blueprint $table) {
            $table->increments('id');
			 $table->string('employee_id'); 
			 $table->string('start_date'); 
			 $table->string('end_date'); 
			 $table->string('job_id'); 
			 
			 $table->integer('department_id')->unsigned()->nullable(); 
			 $table->boolean('status')->default(false);
            $table->timestamps();
			$table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_history');
    }
}
