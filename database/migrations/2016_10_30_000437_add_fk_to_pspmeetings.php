<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspmeetings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspmeetings', function (Blueprint $table) {
             $table->foreign('idstudent')->references('IdAlumno')->on('Alumno');
             $table->foreign('idsupervisor')->references('id')->on('supervisors');
             $table->foreign('idtipoestado')->references('id')->on('statuses');
             $table->foreign('idfreeHour')->references('id')->on('freehours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspmeetings', function (Blueprint $table) {
            $table->dropForeign('pspmeetings_idStudent_foreign');
            $table->dropForeign('pspmeetings_idSupervisor_foreign');
            $table->dropForeign('pspmeetings_idTipoEstado_foreign');
        }); 
    }
}
