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
        });
    }
}
