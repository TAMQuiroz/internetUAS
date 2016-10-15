<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoAvailabilitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noAvailabilitys', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('id_profesor');
            $table->softdeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('noAvailabilitys', function (Blueprint $table) {
             $table->foreign('id_profesor')->references('IdDocente')->on('Docente');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('noAvailabilitys');
    }
}
