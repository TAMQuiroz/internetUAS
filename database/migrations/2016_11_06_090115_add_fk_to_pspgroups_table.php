<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspgroups', function (Blueprint $table) {
            //
            $table->foreign('idpspprocess')->references('id')->on('pspprocesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspgroups', function (Blueprint $table) {
            //
            $table->dropForeign('pspgroups_idpspprocess_foreign');
        });
    }
}
