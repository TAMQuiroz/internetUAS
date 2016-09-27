<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingxstatustypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetingxstatustypes', function (Blueprint $table) {
            $table->integer('idMeeting')->unsigned();
            $table->foreign('idMeeting')->references('id')->on('meetings');
            $table->integer('idTipoEstado')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meetingxstatustypes');
    }
}
