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
            $table->integer('idpspgroup')->unsigned();
            $table->foreign('idpspgroup')->references('id')->on('pspgroups');
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
        Schema::drop('pspgroupsxpspprocesses');
    }
}
