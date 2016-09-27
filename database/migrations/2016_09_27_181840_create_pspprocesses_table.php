<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocesses', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::drop('pspprocesses');
    }
}
