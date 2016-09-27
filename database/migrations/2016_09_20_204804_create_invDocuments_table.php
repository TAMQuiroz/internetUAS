<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invDocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observacion');
            $table->integer('id_investigador')->unsigned();
            $table->string('ruta');
            $table->integer('version');
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
        Schema::drop('invDocuments');
    }
}