<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvdocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invdocuments', function (Blueprint $table) {
            $table->foreign('id_investigador')->references('IdUsuario')->on('Usuario');
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
        Schema::table('invdocuments', function (Blueprint $table) {
            $table->dropForeign('invdocuments_id_investigador_foreign');
            $table->dropForeign('invdocuments_id_entregable_foreign');
        });
    }
}
