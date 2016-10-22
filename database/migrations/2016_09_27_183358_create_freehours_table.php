<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreehoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freehours', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('hora_ini');
            $table->integer('cantidad');
            $table->integer('idSupervisor')->unsigned();
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
        Schema::drop('freehours');
    }
}
