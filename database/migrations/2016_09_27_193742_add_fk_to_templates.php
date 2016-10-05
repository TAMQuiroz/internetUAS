<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates', function (Blueprint $table) {
             //$table->foreign('idPhase')->references('id')->on('phases');
             //$table->foreign('idSupervisor')->references('id')->on('supervisors');
            $table->foreign('idProfesor')->references('IdDocente')->on('docente');
            $table->foreign('idAdmin')->references('IdUsuario')->on('usuario');
            //$table->foreign('idTipoEstado')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates', function (Blueprint $table) {
            //$table->dropForeign('templates_idPhase_foreign');
            //$table->dropForeign('templates_idSupervisor_foreign');
            $table->dropForeign('templates_idProfesor_foreign');
            $table->dropForeign('templates_idAdmin_foreign');
            //$table->dropForeign('templates_idTipoEstado_foreign');
        });
    }
}
