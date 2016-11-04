<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspstudentsxaspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspstudentsxaspects', function (Blueprint $table) {
            //
            $table->foreign('idalumno')->references('IdAlumno')->on('Alumno');
            $table->foreign('idaspecto')->references('IdAspecto')->on('Aspecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspstudentsxaspects', function (Blueprint $table) {
            //
            $table->dropForeign('pspstudentsxaspects_idalumno_foreign');
            $table->dropForeign('pspstudentsxaspects_idaspecto_foreign');
        });
    }
}
