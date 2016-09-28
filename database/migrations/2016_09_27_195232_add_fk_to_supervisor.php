<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSupervisor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisor', function (Blueprint $table) {
             $table->foreign('idUser')->references('IdUsuario')->on('usuario');
             $table->foreign('idFaculty')->references('IdEspecialidad')->on('especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisor', function (Blueprint $table) {
            $table->dropForeign('supervisor_idUser_foreign');
            $table->dropForeign('supervisor_idFaculty_foreign');
        });
    }
}
