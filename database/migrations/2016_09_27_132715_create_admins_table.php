<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('idAdmin');
            $table->string('nombres');
            $table->string('contraseña');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('correo');
            $table->string('direccion');
            $table->integer('telefono');
            $table->char('estado');
            $table->string('codigoTrabajador');
            $table->integer('idFaculty')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
