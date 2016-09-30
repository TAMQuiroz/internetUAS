<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('ubicacion');
            $table->text('descripcion');
            $table->date('fecha');
            $table->dateTime('hora');
            $table->integer('duracion');
            $table->integer('tipo');
            $table->string('imagen')->nullable();
            $table->integer('id_grupo')->unsigned();
            $table->softDeletes();
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
        Schema::drop('events');
    }
}
