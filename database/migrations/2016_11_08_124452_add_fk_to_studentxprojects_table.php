<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToStudentxprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentxprojects', function (Blueprint $table) {
            $table->foreign('id_estudiante')->references('id')->on('tutstudents');
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
        Schema::table('studentxprojects', function (Blueprint $table) {
            $table->dropForeign('studentxprojects_id_estudiante_foreign');
            $table->dropForeign('studentxprojects_id_proyecto_foreign');
        });
    }
}
