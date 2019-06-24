<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativeControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_controls', function (Blueprint $table) {
            $table->increments('idadmin_control');
            $table->integer('id_user')->unsigned();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('extra')->nullable();
            $table->integer('status')->default(0);
            $table->time('delay');
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
        Schema::dropIfExists('admin_controls');
    }
}
