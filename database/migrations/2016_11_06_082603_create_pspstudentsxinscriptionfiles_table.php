<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspstudentsxinscriptionfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspstudentsxinscriptionfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idinscriptionfile')->unsigned();
            $table->foreign('idinscriptionfile')->references('id')->on('inscriptionfiles');
            $table->integer('idpspstudents')->unsigned();
            $table->foreign('idpspstudents')->references('id')->on('pspstudents'); //referencia a la tabla pspstudents            
            $table->integer('acepta_terminos');
            $table->integer('nota_final');
            $table->softDeletes();
            $table->timestamps();
            //$table->integer('aceptaTerminos')->unsigned();
            //$table->foreign('aceptaTerminos')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pspstudentsxinscriptionfiles');
    }
}
