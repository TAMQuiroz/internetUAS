<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptionfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tiene_convenio');
            $table->date('fechaRecepConvenio');
            $table->date('fechaInicio');
            $table->date('fechaTermino');
            $table->string('actividadesFormativas');
            $table->string('nombreEmpresa_razonSocial');
            $table->string('actividadEconomica');
            $table->string('direccionEmpresa');
            $table->string('distritoEmpresa');
            $table->string('nombreArea');
            $table->string('ubicacionArea');
            $table->string('equipamientoArea');
            $table->string('equipamientoDelPracticante');
            $table->string('personalArea');
            $table->string('condicionesSeguridadArea');
            $table->string('CorreoJefeDirecto');
            $table->string('telefonoJefeDirecto');
            $table->string('nombreApellidoJefeDirectoAuxiliar');
            $table->string('puesto');
            $table->string('recomendaciones');
            $table->integer('debe_modificarse');
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
        Schema::drop('inscriptionfiles');
    }
}
