<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letra',1);
            $table->string('descripcion');
            $table->integer('id_question')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('alternatives', function (Blueprint $table) {
             $table->foreign('id_question')->references('id')->on('questions');
        });
    }

    
    public function down()
    {
        Schema::drop('alternatives');
    }
}
