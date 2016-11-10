<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTutstudentxevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutstudentxevaluations', function (Blueprint $table) {
            $table->foreign('id_tutstudent')->references('id')->on('tutstudents');
            $table->foreign('id_evaluation')->references('id')->on('evaluations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutstudentxevaluations', function (Blueprint $table) {
            $table->dropForeign('tutstudentxevaluations_id_tutstudent_foreign');
            $table->dropForeign('tutstudentxevaluations_id_evaluation_foreign');            
        });
    }
}
