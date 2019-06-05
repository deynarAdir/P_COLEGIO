<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('idstudent');
            $table->integer('id_user')->unsigned();
            $table->integer('id_manager')->unsigned();
            $table->integer('id_degree')->unsigned();
            $table->integer('id_parallel')->unsigned();
            $table->integer('student_status');
            $table->string('rude',45)->nullable();
            $table->string('blood_type',10);
            $table->integer('age');
            $table->timestamps();

            $table->foreign('id_user')->references('iduser')->on('users');
            $table->foreign('id_manager')->references('idmanager')->on('managers');
            $table->foreign('id_degree')->references('iddegree')->on('degrees');
            $table->foreign('id_parallel')->references('idparallel')->on('parallels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
