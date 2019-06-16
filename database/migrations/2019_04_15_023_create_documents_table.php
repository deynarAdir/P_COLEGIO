<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('iddocument');
            $table->integer('id_student')->unsigned();
            $table->boolean('ci_photocopy');
            $table->boolean('birth_certificate_original');
            $table->boolean('rude');
            $table->boolean('photocopy_legalized_notebook');
            $table->boolean('original_notepad');
            $table->timestamps();

            $table->foreign('id_student')->references('idstudent')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
