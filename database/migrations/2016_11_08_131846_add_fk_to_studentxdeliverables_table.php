<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToStudentxdeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentxdeliverables', function (Blueprint $table) {
            $table->foreign('id_estudiante')->references('id')->on('tutstudents');
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
        Schema::table('studentxdeliverables', function (Blueprint $table) {
            $table->dropForeign('studentxdeliverables_id_estudiante_foreign');
            $table->dropForeign('studentxdeliverables_id_entregable_foreign');
        });
    }
}
