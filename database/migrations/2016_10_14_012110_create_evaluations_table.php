<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('nombre');
            $table->string('descripcion',1000);
            $table->integer('tiempo')->unsigned();
            $table->integer('id_especialidad');
            $table->integer('estado')->unsigned();//0->cancelado,1->creado, 2->vigente, 3->expirado
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('evaluations', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
