<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherxtutstudentxevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherxtutstudentxevaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tutstudentxevaluation')->unsigned();
            $table->integer('id_docente');
            $table->timestamps();
        });

        Schema::table('teacherxtutstudentxevaluations', function (Blueprint $table) {            
            $table->foreign('id_tutstudentxevaluation')->references('id')->on('tutstudentxevaluations');
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
        Schema::table('teacherxtutstudentxevaluations', function (Blueprint $table) {
            $table->dropForeign('teacherxtutstudentxevaluations_id_tutstudentxevaluation_foreign');
            $table->dropForeign('teacherxtutstudentxevaluations_id_docente_foreign');             
        });
        Schema::drop('teacherxtutstudentxevaluations');
    }
}
