<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToNoavailabilitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('noavailabilitys', function (Blueprint $table) {
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
        Schema::table('noavailabilitys', function (Blueprint $table) {
             $table->dropForeign('noavailabilitys_id_docente_foreign');             
        });
    }
}
