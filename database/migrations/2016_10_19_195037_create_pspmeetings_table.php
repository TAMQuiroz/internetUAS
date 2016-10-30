<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspmeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspmeetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtipoestado')->unsigned();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->date('fecha');
            $table->integer('idstudent');
            $table->integer('idsupervisor')->unsigned();
            $table->char('asistencia');
            $table->string('lugar');
            $table->string('observaciones');
            $table->string('retroalimentacion');    
            $table->integer('tiporeunion');
            $table->integer('idfreeHour')->unsigned()->nullable();         /* para reservar cita(lesly)*/            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pspmeetings');
    }
}
