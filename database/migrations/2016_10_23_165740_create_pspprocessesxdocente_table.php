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
            $table->integer('idpspprocess')->unsigned();
            $table->foreign('idpspprocess')->references('id')->on('pspprocesses');
            $table->integer('iddocente');
            $table->foreign('iddocente')->references('IdDocente')->on('Docente');
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
        Schema::drop('pspprocessesxdocente');
    }
}
