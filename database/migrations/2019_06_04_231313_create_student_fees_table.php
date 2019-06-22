<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees', function (Blueprint $table) {
            
            $table->increments('idstudent_fee');
            $table->integer('id_student')->unsigned();
            $table->integer('id_fee_types')->unsigned();

            $table->date('start_date');
            $table->date('end_date');
            $table->string('description',50);
            $table->decimal('price',7,2);
            $table->boolean('state')->default(1);
            $table->timestamps();

            $table->foreign('id_student')->references('idstudent')->on('students');
            $table->foreign('id_fee_types')->references('idfee_type')->on('fee_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_fees');
    }
}
