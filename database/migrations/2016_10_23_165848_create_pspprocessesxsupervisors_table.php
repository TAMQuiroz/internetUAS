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
            $table->integer('idPspProcess')->unsigned();
            $table->foreign('idPspProcess')->references('id')->on('pspprocesses');
            $table->integer('idSupervisor')->unsigned();
            $table->foreign('idSupervisor')->references('id')->on('supervisors');
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
