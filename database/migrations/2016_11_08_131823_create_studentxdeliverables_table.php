<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentxdeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentxdeliverables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->integer('id_entregable')->unsigned();
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
        Schema::drop('studentxdeliverables');
    }
}
