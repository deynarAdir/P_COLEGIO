<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('idpayment');
            $table->integer('id_student')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('nit_ci');
            $table->dateTime('date');
            $table->string('invoice_series');
            $table->string('invoice_number');
            $table->decimal('total_payment');
            $table->string('state');
            $table->foreign('id_student')->references('iduser')->on('users');
            $table->foreign('id_user')->references('iduser')->on('users');
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
        Schema::dropIfExists('payments');
    }
}
