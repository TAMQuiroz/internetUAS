<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspgroupsxpspprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspgroupsxpspprocesses', function (Blueprint $table) {
            $table->integer('idPSPGroup')->unsigned();
            $table->foreign('idPSPGroup')->references('id')->on('pspgroups');
            $table->integer('idPspProcesses')->unsigned();
            $table->foreign('idPspProcesses')->references('id')->on('pspprocesses');
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
        Schema::drop('pspgroupsxpspprocesses');
    }
}
