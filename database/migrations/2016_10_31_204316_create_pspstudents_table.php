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
            $table->integer('idalumno');
            $table->integer('idtipoestado')->unsigned();
            $table->string('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->integer('idpspgroup')->unsigned();
            $table->integer('idespecialidad');
            $table->integer('idsupervisor')->unsigned();
            $table->softDeletes();
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
