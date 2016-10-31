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
             $table->foreign('iduser')->references('IdUsuario')->on('Usuario');
             $table->foreign('idespecialidad')->references('IdEspecialidad')->on('Especialidad');
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
            $table->dropForeign('admins_iduser_foreign');
            $table->dropForeign('admins_idespecialidad_foreign');
        }); 
    }
}
