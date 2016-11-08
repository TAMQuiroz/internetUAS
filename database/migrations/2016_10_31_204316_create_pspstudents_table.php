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
            $table->integer('idtipoestado')->unsigned()->nullable();
            //$table->string('telefono');
            $table->integer('idpspgroup')->unsigned()->nullable();
            $table->integer('idespecialidad')->nullable();
            $table->integer('idsupervisor')->unsigned()->nullable();
            $table->integer('idpspprocess')->unsigned()->nullable();
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
