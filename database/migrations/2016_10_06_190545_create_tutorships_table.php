<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tutor');
            $table->integer('id_profesor');
            $table->integer('id_suplente');
            $table->integer('id_alumno');
            $table->softDeletes();
            $table->timestamps();
        });

        //las llaves foraneas
        Schema::table('tutorships', function (Blueprint $table) {
             $table->foreign('id_tutor')->references('IdDocente')->on('Docente');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tutorships');
    }
}
