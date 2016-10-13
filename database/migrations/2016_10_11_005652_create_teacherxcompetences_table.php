<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherxcompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherxcompetences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_docente');
            $table->integer('id_especialidad');
            $table->integer('id_competencia')->unsigned();
            $table->timestamps();
        });

        Schema::table('teacherxcompetences', function (Blueprint $table) {
            $table->foreign('id_docente')->references('IdDocente')->on('Docente');
            $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
            $table->foreign('id_competencia')->references('id')->on('competence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teacherxcompetences');
        Schema::table('teacherxcompetences', function (Blueprint $table) {
            $table->dropForeign('teacherxcompetences_id_docente_foreign');
            $table->dropForeign('teacherxcompetences_id_especialidad_foreign');
            $table->dropForeign('teacherxcompetences_id_competencia_foreign');
        });
    }
}
