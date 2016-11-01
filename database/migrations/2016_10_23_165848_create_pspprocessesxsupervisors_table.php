<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesxsupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocessesxsupervisors', function (Blueprint $table) {
            $table->integer('idpspprocess')->unsigned();
            $table->foreign('idpspprocess')->references('id')->on('pspprocesses');
            $table->integer('idsupervisor')->unsigned();
            $table->foreign('idsupervisor')->references('id')->on('supervisors');
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
        Schema::drop('pspprocessesxsupervisors');
    }
}
