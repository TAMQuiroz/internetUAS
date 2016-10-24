<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSupervisors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisors', function (Blueprint $table) {
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
        Schema::table('supervisors', function (Blueprint $table) {
            $table->dropForeign('supervisors_idUser_foreign');
            $table->dropForeign('supervisors_idFaculty_foreign');
        });
    }
}
