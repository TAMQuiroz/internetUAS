<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTipoEstado');
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table->date('fecha');
            $table->integer('idStudent');
            $table->integer('idSupervisor');
            $table->char('asistencia');
            $table->string('lugar');
            $table->string('observaciones');
            $table->string('retroalimentacion');    
            $table->integer('tipoReunion');
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
        Schema::drop('meetings');
    }
}
