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
            $table->integer('id_monthly_payment')->unsigned();
            $table->integer('id_payment')->unsigned();
            $table->decimal('price',7,2);
            $table->timestamps();

            $table->foreign('id_monthly_payment')->references('idmonthly_payment')->on('monthly_payments');
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
