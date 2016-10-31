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
             $table->foreign('iduser')->references('IdUsuario')->on('Usuario');
             $table->foreign('idfaculty')->references('IdEspecialidad')->on('Especialidad');
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
            $table->dropForeign('supervisors_iduser_foreign');
            $table->dropForeign('supervisors_idfaculty_foreign');
        });
    }
}
