<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTeacherxgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacherxgroups', function (Blueprint $table) {
            $table->foreign('id_profesor')->references('IdDocente')->on('Docente');
            $table->foreign('id_grupo')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacherxgroups', function (Blueprint $table) {
            $table->dropForeign('teacherxgroups_id_profesor_foreign');
            $table->dropForeign('teacherxgroups_id_grupo_foreign');
        });
    }
}
