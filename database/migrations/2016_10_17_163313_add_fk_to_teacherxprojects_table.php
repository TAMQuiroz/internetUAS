<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTeacherxprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacherxprojects', function (Blueprint $table) {
            $table->foreign('id_profesor')->references('IdDocente')->on('Docente');
            $table->foreign('id_proyecto')->references('id')->on('projects');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacherxprojects', function (Blueprint $table) {
            $table->dropForeign('teacherxprojects_id_profesor_foreign');
            $table->dropForeign('teacherxprojects_id_proyecto_foreign');
        });
    }
}
