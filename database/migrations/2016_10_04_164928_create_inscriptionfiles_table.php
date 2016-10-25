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
            $table->date('fecha_recep_convenio');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('activ_formativas');
            $table->string('razon_social');
            $table->string('actividad_economica');
            $table->string('direccion_empresa');
            $table->string('distrito_empresa');
            $table->string('nombre_area');
            $table->string('ubicacion_area');
            $table->string('equipamiento_area');
            $table->string('equi_del_practicante');
            $table->string('personal_area');
            $table->string('cond_seguridad_area');
            $table->string('Correo_jefe_directo');
            $table->string('telef_jefe_directo');
            $table->string('jefe_directo_aux');
            $table->string('puesto');
            $table->string('recomendaciones');
            $table->integer('debe_modificarse');
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
        Schema::drop('inscriptionfiles');
    }
}
