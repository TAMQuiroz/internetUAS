<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspstudentsxcriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspstudentsxcriterios', function (Blueprint $table) {
            //
            $table->foreign('idpspstudent')->references('id')->on('pspstudents');
            $table->foreign('idcriterio')->references('id')->on('pspcriterios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspstudentsxcriterios', function (Blueprint $table) {
            //
            $table->dropForeign('pspstudentsxcriterios_idpspstudent_foreign');
            $table->dropForeign('pspstudentsxcriterios_idcriterio_foreign');
        });
    }
}
