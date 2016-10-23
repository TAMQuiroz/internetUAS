<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTeacherxcompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacherxcompetences', function (Blueprint $table) {
            //las llaves foraneas
            $table->foreign('id_docente')->references('IdDocente')->on('Docente');
            $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
            $table->foreign('id_competence')->references('id')->on('competences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacherxcompetences', function (Blueprint $table) {
            $table->dropForeign('teacherxcompetences_id_docente_foreign');
            $table->dropForeign('teacherxcompetences_id_especialidad_foreign');
            $table->dropForeign('teacherxcompetences_id_competence_foreign');
        });
    }
}
