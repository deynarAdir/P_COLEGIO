<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('idcontract');
            $table->integer('id_user')->unsigned();
            $table->integer('id_type_contract')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('payment');
            //$table->decimal('total_hours',4,2);
            $table->timestamps();

            $table->foreign('id_user')->references('iduser')->on('users');
            $table->foreign('id_type_contract')->references('idtype_contract')->on('type_contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
