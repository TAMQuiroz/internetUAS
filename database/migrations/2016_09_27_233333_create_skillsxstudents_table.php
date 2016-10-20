<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsxstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skillsxstudents', function (Blueprint $table) {
            $table->integer('idStudent')->unsigned();
            $table->foreign('idStudent')->references('IdAlumno')->on('alumno');
            $table->integer('idCriterio')->unsigned();
            $table->foreign('idCriterio')->references('id')->on('skills');
            $table->integer('nota');
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
        Schema::drop('skillsxstudents');
    }
}
