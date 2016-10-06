<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutstudents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');//del uas
            $table->string('codigo');
            $table->string('nombre');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('correo');            
            $table->integer('id_especialidad'); //del uas
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('tutstudents', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
             $table->foreign('id_usuario')->references('IdUsuario')->on('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tutstudents');
    }
}
