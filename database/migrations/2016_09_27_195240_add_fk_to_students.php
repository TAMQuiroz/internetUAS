<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
             $table->foreign('idUser')->references('id')->on('users');
             $table->foreign('idPspGroup')->references('id')->on('pspgroup');
             $table->foreign('idSupervisor')->references('id')->on('supervisor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_idUser_foreign');
            $table->dropForeign('students_idPspGroup_foreign');
            $table->dropForeign('students_idSupervisor_foreign');
        });
    }
}
