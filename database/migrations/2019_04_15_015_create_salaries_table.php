<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('idsalary');
            $table->integer('id_user')->unsigned();
            $table->date('date');
            $table->integer('total');
            $table->string('observation',100);
            $table->string('invoice_number');
            $table->integer('bond');
            $table->timestamps();

            $table->foreign('id_user')->references('iduser')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
