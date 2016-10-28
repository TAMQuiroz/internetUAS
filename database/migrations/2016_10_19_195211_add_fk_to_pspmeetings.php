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
             $table->foreign('idStudent')->references('IdAlumno')->on('Alumno');
             $table->foreign('idSupervisor')->references('id')->on('supervisors');
             $table->foreign('idTipoEstado')->references('id')->on('statuses');
             $table->foreign('idFreeHour')->references('id')->on('freehours');
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
