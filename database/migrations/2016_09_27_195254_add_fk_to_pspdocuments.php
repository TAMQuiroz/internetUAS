<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspdocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspdocuments', function (Blueprint $table) {
             $table->foreign('idStudent')->references('id')->on('pspstudents');
             $table->foreign('idTemplate')->references('id')->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspdocuments', function (Blueprint $table) {
            $table->dropForeign('pspdocuments_idStudent_foreign');
            $table->dropForeign('pspdocuments_idTemplate_foreign');
        });  
    }
}
