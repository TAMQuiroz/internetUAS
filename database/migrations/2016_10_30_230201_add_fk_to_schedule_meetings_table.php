<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToScheduleMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_meetings', function (Blueprint $table) {
            //
            $table->foreign('idfase')->references('id')->on('phases');
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
        Schema::table('schedule_meetings', function (Blueprint $table) {
            //
            $table->dropForeign('schedule_meetings_idfase_foreign');
            $table->dropForeign('schedule_meetings_idpspprocess_foreign');
        });
    }
}
