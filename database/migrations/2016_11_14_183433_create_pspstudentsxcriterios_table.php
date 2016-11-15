<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspstudentsxcriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspstudentsxcriterios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpspstudent')->unsigned();
            $table->integer('idcriterio')->unsigned();
            $table->integer('nota')->nullable();
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
        Schema::drop('pspstudentsxcriterios');
    }
}
