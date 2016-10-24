<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTeacherxdeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacherxdeliverables', function (Blueprint $table) {
            $table->foreign('id_profesor')->references('IdDocente')->on('Docente');
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
        Schema::table('teacherxdeliverables', function (Blueprint $table) {
            $table->dropForeign('teacherxdeliverables_id_profesor_foreign');
            $table->dropForeign('teacherxdeliverables_id_entregable_foreign');
        });
    }
}
