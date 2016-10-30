<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspprocesses', function (Blueprint $table) {
            //
            $table->foreign('idespecialidad')->references('idEspecialidad')->on('Especialidad');
            $table->foreign('idcurso')->references('IdCurso')->on('Curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspprocesses', function (Blueprint $table) {
            //
            $table->dropForeign('pspprocesses_idespecialidad_foreign');
            $table->dropForeign('pspprocesses_idcurso_foreign');
        });
    }
}
