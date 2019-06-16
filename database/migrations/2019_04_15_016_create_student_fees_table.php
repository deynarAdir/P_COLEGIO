<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeesTable extends Migration
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
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description');
            $table->decimal('price',7,2);
            $table->boolean('state')->default(1);

            $table->foreign('id_student')->references('idstudent')->on('students');
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
        Schema::dropIfExists('student_fees');
    }
}
