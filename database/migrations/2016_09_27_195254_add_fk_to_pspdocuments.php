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
             $table->foreign('idstudent')->references('IdAlumno')->on('Alumno');
             $table->foreign('idtemplate')->references('id')->on('templates');
             $table->foreign('idtipoestado')->references('id')->on('statuses');
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
            $table->dropForeign('pspdocuments_idstudent_foreign');
            $table->dropForeign('pspdocuments_idtemplate_foreign');
            $table->dropForeign('pspdocuments_idtipoestado_foreign');
        });  
    }
}
