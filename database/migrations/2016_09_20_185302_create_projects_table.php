<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200);
            $table->text('descripcion',4000);
            $table->integer('num_entregables');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('id_grupo')->unsigned();
            $table->integer('id_area')->unsigned();
            $table->integer('id_status')->unsigned();
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
        Schema::drop('projects');
    }
}
