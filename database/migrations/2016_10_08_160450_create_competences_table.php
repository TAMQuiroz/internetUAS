<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetencesTable extends Migration
{
    
    public function up()
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('id_especialidad');
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('competences', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
        });
    }

    
    public function down()
    {
        Schema::drop('competences');
    }
}
