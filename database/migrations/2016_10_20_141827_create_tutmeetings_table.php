<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutmeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutmeetings', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('inicio')->nullable();
            $table->dateTime('fin')->nullable();
            $table->integer('duracion')->unsigned()->nullable();
            $table->integer('no_programada')->unsigned()->nullable();
            $table->string('observacion',1000)->nullable();
            $table->string('lugar',100)->nullable();
            $table->string('adicional',500)->nullable();
            $table->integer('creador')->unsigned(); //0-> la creo el alumno, 1-> la creo el tutor
            $table->integer('estado')->unsigned();
            $table->integer('id_topic')->unsigned()->nullable();
            $table->integer('id_reason')->unsigned()->nullable();
            $table->integer('id_tutstudent')->unsigned();
            $table->integer('id_docente');
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
        Schema::drop('tutmeetings');
    }
}
