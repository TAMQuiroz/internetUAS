<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspstudents', function (Blueprint $table) {
            //
            $table->foreign('idalumno')->references('IdAlumno')->on('Alumno');
            $table->foreign('idtipoestado')->references('id')->on('statuses');
            $table->foreign('idpspgroup')->references('id')->on('pspgroups');
            $table->foreign('idespecialidad')->references('IdEspecialidad')->on('Especialidad');
            $table->foreign('idsupervisor')->references('id')->on('supervisors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspstudents', function (Blueprint $table) {
            //
             $table->dropForeign('pspstudents_idalumno_foreign');
             $table->dropForeign('pspstudents_idtipoestado_foreign');
             $table->dropForeign('pspstudents_idpspgroup_foreign');
             $table->dropForeign('pspstudents_idespecialidad_foreign');
             $table->dropForeign('pspstudents_idsupervisor_foreign');
        });
    }
}
