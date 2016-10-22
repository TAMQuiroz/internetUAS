<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTutmeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutmeetings', function (Blueprint $table) {
             $table->foreign('id_topic')->references('id')->on('topics');             
             $table->foreign('id_reason')->references('id')->on('reasons');             
             $table->foreign('id_tutstudent')->references('id')->on('tutstudents');             
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
        Schema::table('tutmeetings', function (Blueprint $table) {
             $table->dropForeign('tutmeetings_id_topic_foreign');             
             $table->dropForeign('tutmeetings_id_reason_foreign');             
             $table->dropForeign('tutmeetings_id_tutstudent_foreign');             
             $table->dropForeign('tutmeetings_id_docente_foreign');             
        });
    }
}
