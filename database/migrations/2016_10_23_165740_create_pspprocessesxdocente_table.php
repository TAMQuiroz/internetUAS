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
            $table->integer('IdDocente');
            $table->foreign('IdDocente')->references('IdDocente')->on('Docente');
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
