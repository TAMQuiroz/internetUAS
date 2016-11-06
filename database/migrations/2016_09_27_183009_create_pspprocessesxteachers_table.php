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
            $table->integer('idpspprocesses')->unsigned();
            $table->foreign('idpspprocesses')->references('id')->on('pspprocesses');
            $table->integer('idprofesor');
            $table->foreign('idprofesor')->references('IdDocente')->on('Docente');
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
