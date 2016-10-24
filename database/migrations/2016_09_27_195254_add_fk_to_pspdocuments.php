<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspdocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspdocuments', function (Blueprint $table) {
             //$table->foreign('idStudent')->references('id')->on('pspstudents');
             $table->foreign('idStudent')->references('IdAlumno')->on('Alumno');
             $table->foreign('idTemplate')->references('id')->on('templates');
             $table->foreign('idTipoEstado')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspdocuments', function (Blueprint $table) {
            $table->dropForeign('pspdocuments_idStudent_foreign');
            $table->dropForeign('pspdocuments_idTemplate_foreign');
            $table->dropForeign('pspdocuments_idTipoEstado_foreign');
        });  
    }
}
