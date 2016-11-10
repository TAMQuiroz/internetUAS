<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvquestionxstudentxdocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evquestionxstudentxdocentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tutstudent')->unsigned();
            $table->integer('id_evquestion')->unsigned();
            $table->integer('id_evaluation')->unsigned();
            $table->integer('id_docente')->nullable();
            $table->float('puntaje',8,2)->unsigned()->nullable();
            $table->string('respuesta',5000)->nullable();
            $table->string('comentario',1000)->nullable();
            $table->string('clave_elegida',1)->nullable();
            $table->string('path_archivo',500)->nullable();
            $table->timestamps();
        });

        Schema::table('evquestionxstudentxdocentes', function (Blueprint $table) {
             $table->foreign('id_tutstudent')->references('id')->on('tutstudents');
             $table->foreign('id_evquestion')->references('id')->on('evquestions');
             $table->foreign('id_evaluation')->references('id')->on('evaluations');
             $table->foreign('id_docente')->references('IdDocente')->on('Docente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
         Schema::table('evquestionxstudentxdocentes', function (Blueprint $table) {
            $table->dropForeign('evquestionxstudentxdocentes_id_tutstudent_foreign');
            $table->dropForeign('evquestionxstudentxdocentes_id_evquestion_foreign');
            $table->dropForeign('evquestionxstudentxdocentes_id_evaluation_foreign');
            $table->dropForeign('evquestionxstudentxdocentes_id_docente_foreign');
        });  

        Schema::drop('evquestionxstudentxdocentes');
    }
}
