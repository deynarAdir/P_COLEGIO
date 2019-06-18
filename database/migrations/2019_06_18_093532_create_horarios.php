<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('idhorario');
            $table->integer('id_user')->unsigned();
            $table->integer('id_day')->unsigned();
            $table->time('hour_entry');
            $table->time('hour_exit');
            $table->timestamps();

            $table->foreign('id_user')->references('iduser')->on('users');
            $table->foreign('id_day')->references('idday')->on('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
