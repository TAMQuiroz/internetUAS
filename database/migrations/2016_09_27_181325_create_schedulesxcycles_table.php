<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesxcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulesxcycles', function (Blueprint $table) {
            $table->integer('idschedules');
            $table->foreign('idschedules')->references('IdHorario')->on('horario');
            $table->integer('idcycles')->unsigned();
            $table->foreign('idcycles')->references('id')->on('cycles');
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
        Schema::drop('schedulesxcycles');
    }
}
