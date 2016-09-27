<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePSPprocessesXteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PSPprocessesXteachers', function (Blueprint $table) {
            $table->integer('idPspProcesses')->unsigned();
            $table->integer('idProfesor')->unsigned();
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
        Schema::drop('PSPprocessesXteachers');
    }
}
