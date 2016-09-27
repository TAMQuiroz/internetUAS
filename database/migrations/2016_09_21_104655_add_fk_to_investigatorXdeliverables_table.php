<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvestigatorxdeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigatorxdeliverables', function (Blueprint $table) {
            $table->foreign('id_investigador')->references('id')->on('investigators');
            $table->foreign('id_entregable')->references('id')->on('deliverables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investigatorxdeliverables', function (Blueprint $table) {
            $table->dropForeign('investigatorxdeliverables_id_investigador_foreign');
            $table->dropForeign('investigatorxdeliverables_id_entregable_foreign');
        });
    }
}
