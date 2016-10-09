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
            $table->char('letra',1);
            $table->string('descripcion');
            $table->integer('question_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('alternatives', function (Blueprint $table) {
             $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    
    public function down()
    {
        Schema::drop('alternatives');
    }
}
