<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('idProfesor');
            $table->string('nombres');
            $table->string('contraseña');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('correo');
            $table->string('direccion');
            $table->string('telefono');
            $table->char('estado');
            $table->string('cargo')->nullable();
            $table->string('vigente');
            $table->string('descripcion')->nullable();
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
        Schema::drop('teachers');
    }
}
