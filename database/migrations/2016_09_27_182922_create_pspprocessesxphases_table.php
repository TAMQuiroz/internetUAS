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
            $table->integer('idPhase')->unsigned();
            $table->foreign('idPhase')->references('id')->on('phases');
            $table->integer('idPspProcess')->unsigned();
            $table->foreign('idPspProcess')->references('id')->on('pspprocesses');
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
