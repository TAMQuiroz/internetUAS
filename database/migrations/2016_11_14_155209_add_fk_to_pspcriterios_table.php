<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPspcriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pspcriterios', function (Blueprint $table) {
            $table->foreign('id_pspprocess')->references('id')->on('pspprocesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pspcriterios', function (Blueprint $table) {
            $table->dropForeign('pspcriterios_id_pspprocess_foreign');
        });
    }
}
