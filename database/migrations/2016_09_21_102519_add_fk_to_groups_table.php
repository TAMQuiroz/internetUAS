<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('especialidad');
             $table->foreign('id_lider')->references('IdDocente')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign('groups_id_especialidad_foreign');
            $table->dropForeign('groups_id_lider_foreign');
        });
    }
}
