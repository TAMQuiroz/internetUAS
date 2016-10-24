<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesxdocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocessesxdocente', function (Blueprint $table) {
            $table->integer('idPspProcess')->unsigned();
            $table->foreign('idPspProcess')->references('id')->on('pspprocesses');
            $table->integer('IdDocente')->unsigned();
            $table->foreign('IdDocente')->references('id')->on('Docente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pspprocessesxdocente');
    }
}
