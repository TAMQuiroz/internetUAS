<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentxinscriptionfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentxinscriptionfiles', function (Blueprint $table) {
            $table->integer('idInscriptionFile')->unsigned();
            $table->foreign('idInscriptionFile')->references('id')->on('inscriptionfiles');
            $table->integer('idStudent')->unsigned();
            $table->foreign('idStudent')->references('IdAlumno')->on('alumno');
            //$table->integer('aceptaTerminos')->unsigned();
            //$table->foreign('aceptaTerminos')->references('id')->on('statuses');
            $table->integer('acepta_terminos');
            $table->integer('nota_final');
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
        Schema::drop('studentxinscriptionfiles');
    }
}
