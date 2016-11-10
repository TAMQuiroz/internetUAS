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
             $table->foreign('idphase')->references('id')->on('phases');
             $table->foreign('idsupervisor')->references('id')->on('supervisors');
            $table->foreign('idprofesor')->references('IdDocente')->on('Docente');
            $table->foreign('idadmin')->references('IdUsuario')->on('Usuario');
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
        Schema::table('templates', function (Blueprint $table) {
            $table->dropForeign('templates_idphase_foreign');
            $table->dropForeign('templates_idsupervisor_foreign');
            $table->dropForeign('templates_idprofesor_foreign');
            $table->dropForeign('templates_idadmin_foreign');
            $table->dropForeign('templates_idtipoestado_foreign');
        });
    }
}
