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
            $table->foreign('idEspecialidad')->references('idEspecialidad')->on('especialidad');
            $table->foreign('IdCurso')->references('IdCurso')->on('curso');
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
            $table->dropForeign('pspprocesses_idEspecialidad_foreign');
            $table->dropForeign('pspprocesses_IdCurso_foreign');
        });
    }
}
