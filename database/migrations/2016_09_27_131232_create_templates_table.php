<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('idTemplate');
            $table->integer('idPhase')->unsigned();
            $table->integer('idTipoEstado')->unsigned();
            $table->integer('idProfesor')->unsigned();
            $table->integer('idSupervisor')->unsigned();
            $table->integer('idAdmin')->unsigned();
            $table->string('titulo');
            $table->string('ruta');
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
        Schema::drop('templates');
    }
}
