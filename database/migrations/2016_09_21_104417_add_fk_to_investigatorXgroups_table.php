<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvestigatorXgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigatorXgroups', function (Blueprint $table) {
            $table->foreign('id_investigador')->references('id')->on('investigators');
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
        Schema::table('investigatorXgroups', function (Blueprint $table) {
            $table->dropForeign('investigatorXgroups_id_investigador_foreign');
            $table->dropForeign('investigatorXgroups_id_grupo_foreign');
        });
    }
}
