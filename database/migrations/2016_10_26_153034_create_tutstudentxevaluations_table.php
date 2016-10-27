<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutstudentxevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutstudentxevaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tutstudent')->unsigned();
            $table->integer('id_evaluation')->unsigned();
            $table->integer('intentos')->unsigned();
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
        Schema::drop('tutstudentxevaluations');
    }
}
