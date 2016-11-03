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
            $table->string('titulo_plantilla')->nullable();
            $table->string('ruta_plantilla')->nullable();
            $table->string('observaciones');
            $table->char('es_obligatorio');
            $table->integer('idstudent');
            $table->integer('idtemplate')->unsigned();
            $table->integer('idtipoestado')->unsigned();
            $table->integer('numerofase')->nullable();
            $table->integer('es_fisico')->nullable();
            $table->date('fecha_limite');
            $table->integer('es_fisico')->nullable();
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
        Schema::drop('pspdocuments');
    }
}
