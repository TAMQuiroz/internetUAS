<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToEvquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //las llaves foraneas
        Schema::table('evquestions', function (Blueprint $table) {             
             $table->foreign('id_docente')->references('IdDocente')->on('Docente');
             $table->foreign('id_competence')->references('id')->on('competences');
             $table->foreign('id_evaluation')->references('id')->on('evaluations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evquestions', function (Blueprint $table) {
             $table->dropForeign('evquestions_id_docente_foreign');                  
             $table->dropForeign('evquestions_id_competence_foreign');                  
             $table->dropForeign('evquestions_id_evaluation_foreign');                  
        });
    }
}
