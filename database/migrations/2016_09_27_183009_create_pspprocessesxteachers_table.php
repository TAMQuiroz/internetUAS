<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesxteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocessesxteachers', function (Blueprint $table) {
            $table->integer('idPspProcesses')->unsigned();
            $table->foreign('idPspProcesses')->references('id')->on('pspprocesses');
            $table->integer('idProfesor');
            $table->foreign('idProfesor')->references('IdDocente')->on('Docente');
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
        Schema::drop('pspprocessesxteachers');
    }
}
