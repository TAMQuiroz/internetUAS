<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTutschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutschedules', function (Blueprint $table) {
             $table->foreign('id_docente')->references('IdDocente')->on('Docente');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutschedules', function (Blueprint $table) {
             $table->dropForeign('tutschedules_id_docente_foreign');             
        });
    }
}
