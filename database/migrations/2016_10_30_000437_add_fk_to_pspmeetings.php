<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspmeetings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspmeetings', function (Blueprint $table) {
             $table->foreign('idstudent')->references('IdAlumno')->on('Alumno');
             $table->foreign('idsupervisor')->references('id')->on('supervisors');
             $table->foreign('idtipoestado')->references('id')->on('statuses');
             $table->foreign('idfreehour')->references('id')->on('freehours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspmeetings', function (Blueprint $table) {
            $table->dropForeign('pspmeetings_idstudent_foreign');
            $table->dropForeign('pspmeetings_idsupervisor_foreign');
            $table->dropForeign('pspmeetings_idtipoestado_foreign');
            $table->dropForeign('pspmeetings_idfreehour_foreign');
        }); 
    }
}
