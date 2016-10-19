<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutSchedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dia')->unsigned()->nullable();
            $table->integer('hora_inicio')->unsigned()->nullable();//numero del 0 al 23
            $table->integer('hora_fin')->unsigned()->nullable();//numero del 0 al 23
            $table->integer('id_profesor');
            $table->softdeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('tutSchedules', function (Blueprint $table) {
             $table->foreign('id_profesor')->references('IdDocente')->on('Docente');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tutSchedules');
    }
}
