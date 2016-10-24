<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToFreehour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freehours', function (Blueprint $table) {
             $table->foreign('idSupervisor')->references('id')->on('supervisors');
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
            $table->dropForeign('freehour_idSupervisor_foreign');
        });  
    }
}
