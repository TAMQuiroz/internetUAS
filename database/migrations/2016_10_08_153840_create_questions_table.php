<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{    
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo')->unsigned();//1->cerrada, 2->abierta, 3->de archivo
            $table->string('descripcion',500);
            $table->integer('tiempo')->unsigned();
            $table->float('puntaje',8,2)->unsigned();
            $table->integer('dificultad')->unsigned();//1->baja, 2->media, 3->alta
            $table->string('requisito')->nullable();
            $table->char('rpta',1)->nullable();
            $table->integer('tamano_arch')->unsigned()->nullable();
            $table->string('extension_arch')->nullable();
            $table->integer('tipo_tamano')->unsigned()->nullable(); //0->KB, 1->MB, 2->GB
            $table->integer('id_especialidad'); //del uas
            $table->integer('id_docente'); //del uas
            $table->integer('competence_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('questions', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
             $table->foreign('id_docente')->references('IdDocente')->on('Docente');
             $table->foreign('competence_id')->references('id')->on('competences');             
        });
    }

    public function down()
    {
        Schema::drop('questions');
    }
}
