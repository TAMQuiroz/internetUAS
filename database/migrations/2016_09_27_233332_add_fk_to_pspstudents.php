<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspstudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspstudents', function (Blueprint $table) {
             $table->foreign('idUser')->references('IdUsuario')->on('usuario');
             $table->foreign('idPspGroup')->references('id')->on('pspgroup');
             $table->foreign('idFaculty')->references('IdEspecialidad')->on('especialidad');
             $table->foreign('idSupervisor')->references('id')->on('supervisors');
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
            $table->dropForeign('pspstudents_idUser_foreign');
            $table->dropForeign('pspstudents_idPspGroup_foreign');
            $table->dropForeign('pspstudents_idFaculty_foreign');
            $table->dropForeign('pspstudents_idSupervisor_foreign');
        });
    }
}
