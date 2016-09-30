<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvestigatorxprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigatorxprojects', function (Blueprint $table) {
            $table->foreign('id_investigador')->references('id')->on('investigators');
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
        Schema::table('investigatorxprojects', function (Blueprint $table) {
            $table->dropForeign('investigatorxprojects_id_investigador_foreign');
            $table->dropForeign('investigatorxprojects_id_proyecto_foreign');
        });
    }
}
