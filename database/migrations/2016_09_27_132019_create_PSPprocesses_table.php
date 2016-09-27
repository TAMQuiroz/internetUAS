<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePSPprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PSPprocesses', function (Blueprint $table) {
            $table->increments('idPspProcesses');
            $table->integer('numFases');
            $table->integer('numPlantillas');
            $table->integer('maxTamPlantilla');
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
        Schema::drop('PSPprocesses');
    }
}
