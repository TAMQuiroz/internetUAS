<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToInvestigatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investigators', function (Blueprint $table) {
             $table->foreign('id_especialidad')->references('IdEspecialidad')->on('Especialidad');
             $table->foreign('id_area')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investigators', function (Blueprint $table) {
            $table->dropForeign('investigators_id_especialidad_foreign');
            $table->dropForeign('investigators_id_area_foreign');
        });
    }
}
