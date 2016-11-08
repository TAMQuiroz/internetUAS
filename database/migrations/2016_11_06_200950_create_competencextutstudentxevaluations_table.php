<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetencextutstudentxevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencextutstudentxevaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tutev')->unsigned();
            $table->integer('id_competence')->unsigned();
            $table->float('puntaje_maximo',8,2)->unsigned()->nullable();
            $table->float('puntaje',8,2)->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('competencextutstudentxevaluations', function (Blueprint $table) {
             $table->foreign('id_tutev')->references('id')->on('tutstudentxevaluations')->onDelete('cascade');
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
        Schema::table('competencextutstudentxevaluations', function (Blueprint $table) {
            $table->dropForeign('competencextutstudentxevaluations_id_tutev_foreign');
            $table->dropForeign('competencextutstudentxevaluations_id_competence_foreign');            
        });  

        Schema::drop('competencextutstudentxevaluations');
    }
}
