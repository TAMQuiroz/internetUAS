<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
             $table->foreign('idUser')->references('IdUsuario')->on('usuario');
             $table->foreign('idEspecialidad')->references('IdEspecialidad')->on('especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign('admins_idUser_foreign');
            $table->dropForeign('admins_idEspecialidad_foreign');
        }); 
    }
}
