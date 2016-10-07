<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutstudentsTable extends Migration
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
            $table->integer('id_usuario')->nullable();//del uas
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('correo');            
            $table->integer('id_especialidad')->nullable(); //del uas
            $table->integer('id_tutoria')->unsigned()->nullable(); 
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('tutstudents', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
             $table->foreign('id_usuario')->references('IdUsuario')->on('Usuario');
             $table->foreign('id_tutoria')->references('id')->on('tutorships');
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
