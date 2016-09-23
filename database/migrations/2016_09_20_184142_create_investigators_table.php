<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->string('nombre');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('correo');
            $table->integer('celular');
            $table->integer('id_especialidad')->unsigned();
            $table->integer('id_area')->unsigned()->nullable();
            $table->integer('Vigente');
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
        Schema::drop('investigators');
    }
}
