<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvestigatorXdeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigatorXdeliverables', function (Blueprint $table) {
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
        Schema::table('investigatorXdeliverables', function (Blueprint $table) {
            $table->dropForeign('investigatorXdeliverables_id_investigador_foreign');
            $table->dropForeign('investigatorXdeliverables_id_entregable_foreign');
        });
    }
}
