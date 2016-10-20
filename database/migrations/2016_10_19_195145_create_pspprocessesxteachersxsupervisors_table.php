<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePspprocessesxteachersxsupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pspprocessesxteachersxsupervisors', function (Blueprint $table) {
            $table->integer('idPspProcess')->unsigned();
            $table->foreign('idPspProcess')->references('id')->on('pspprocesses');
            $table->integer('idProfesor');
            $table->foreign('idProfesor')->references('IdDocente')->on('docente');
            $table->integer('idSupervisor');
            $table->foreign('idSupervisor')->references('id')->on('supervisors');
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
        Schema::drop('pspprocessesxteachersxsupervisors');
    }
}
