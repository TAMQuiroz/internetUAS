<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToMeetings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meetings', function (Blueprint $table) {
             $table->foreign('idStudent')->references('id')->on('students');
             $table->foreign('idSupervisor')->references('id')->on('supervisor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->dropForeign('meetings_idStudent_foreign');
            $table->dropForeign('meetings_idSupervisor_foreign');
        });     
    }
}
