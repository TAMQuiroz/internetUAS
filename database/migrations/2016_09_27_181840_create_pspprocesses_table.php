<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_Fases');
            $table->integer('numero_Plantillas');
            $table->integer('max_tam_plantilla');
<<<<<<< HEAD
            $table->integer('idEspecialidad');
            $table->integer('idCurso');
            $table->softDeletes();
=======
            $table->integer('Vigente');
>>>>>>> 1364fb5dc44341707c8d025eac35322e6fd36a20
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
        Schema::drop('pspprocesses');
    }
}
