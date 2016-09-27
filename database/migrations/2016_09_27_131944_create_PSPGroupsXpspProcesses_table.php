<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePSPGroupsXpspProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PSPGroupsXpspProcesses', function (Blueprint $table) {
            $table->integer('idPSPGroup')->unsigned();
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
        Schema::drop('PSPGroupsXpspProcesses');
    }
}
