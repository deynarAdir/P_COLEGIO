<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->increments('idstudent_payment');
            $table->integer('id_student_fee')->unsigned();
            $table->integer('id_payment')->unsigned();
            $table->decimal('price',7,2);
            $table->timestamps();

            $table->foreign('id_student_fee')->references('idstudent_fee')->on('student_fees');
            $table->foreign('id_payment')->references('idpayment')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_payments');
    }
}
