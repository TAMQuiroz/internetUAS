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
        });  
    }
}
