<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToFreehours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freehours', function (Blueprint $table) {
             $table->foreign('idsupervisor')->references('id')->on('supervisors');
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
        Schema::table('freehours', function (Blueprint $table) {
            $table->dropForeign('freehours_idsupervisor_foreign');
            $table->dropForeign('freehours_idpspprocess_foreign');
        });  
    }
}
