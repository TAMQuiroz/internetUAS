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
            $table->integer('idphase')->unsigned();
            $table->integer('idtipoestado')->unsigned();
            $table->integer('idprofesor')->nullable();
            $table->integer('idsupervisor')->unsigned()->nullable();
            $table->integer('idadmin')->nullable();
            $table->string('titulo');
            $table->string('ruta');
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
        Schema::drop('templates');
    }
}
