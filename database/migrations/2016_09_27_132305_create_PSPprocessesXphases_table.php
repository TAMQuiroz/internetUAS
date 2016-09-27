<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePSPprocessesXphasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PSPprocessesXphases', function (Blueprint $table) {
            $table->integer('idPhase')->unsigned();
            $table->integer('idPspProcesses')->unsigned();
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
        Schema::drop('PSPprocessesXphases');
    }
}
