<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspdocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspdocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta');
            $table->string('observaciones');
            $table->char('esObligatorio');
            $table->integer('idStudent')->unsigned();
            $table->integer('idTemplate')->unsigned();
            $table->integer('idTipoEstado')->unsigned();
            $table->date('fecha_limite');
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
        Schema::drop('pspdocuments');
    }
}
