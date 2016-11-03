<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesxphasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocessesxphases', function (Blueprint $table) {
            $table->integer('idphase')->unsigned();
            $table->foreign('idphase')->references('id')->on('phases');
            $table->integer('idpspprocess')->unsigned();
            $table->foreign('idpspprocess')->references('id')->on('pspprocesses');
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
        Schema::drop('pspprocessesxphases');
    }
}
