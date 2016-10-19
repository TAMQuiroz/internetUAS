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
            $table->increments('id');
            $table->integer('idPhase')->unsigned();
            $table->integer('idTipoEstado')->unsigned();
            $table->integer('idProfesor')->nullable();
            $table->integer('idSupervisor')->unsigned()->nullable();
            $table->integer('idAdmin')->nullable();
            $table->string('titulo');
            $table->string('ruta');
            //$table->integer('obligatorio');
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
