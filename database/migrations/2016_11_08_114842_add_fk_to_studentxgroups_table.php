<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToStudentxgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentxgroups', function (Blueprint $table) {
            $table->foreign('id_estudiante')->references('id')->on('tutstudents');
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
        Schema::table('studentxgroups', function (Blueprint $table) {
            $table->dropForeign('studentxgroups_id_estudiante_foreign');
            $table->dropForeign('studentxgroups_id_grupo_foreign');
        });
    }
}
