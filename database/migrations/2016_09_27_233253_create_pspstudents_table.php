<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspstudents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('contraseÃ±a');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('correo');
            $table->string('direccion');
            $table->string('telefono');
            $table->char('estado');
            $table->string('codigoAlumno');
            $table->integer('notaFinal');
            $table->string('nombreEmpresa');
            $table->string('telefonoEmpresa');
            $table->string('nombreJefe');
            $table->char('aceptaTerminos');
            $table->integer('idUser')->unsigned();
            $table->integer('idFaculty')->unsigned();
            $table->integer('idPspGroup')->unsigned();
            $table->integer('idSupervisor')->unsigned();
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
        Schema::drop('pspstudents');
    }
}
