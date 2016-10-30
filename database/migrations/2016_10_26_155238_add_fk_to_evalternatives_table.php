<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToEvalternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //las llaves foraneas
        Schema::table('evalternatives', function (Blueprint $table) {
             $table->foreign('id_evquestion')->references('id')->on('evquestions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evalternatives', function (Blueprint $table) {
             $table->dropForeign('evalternatives_id_evquestion_foreign');                  
        });
    }
}
