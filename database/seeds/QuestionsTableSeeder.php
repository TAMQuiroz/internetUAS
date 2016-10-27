<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('teacherxcompetences')->insert(['id_docente' => '4','id_especialidad' => '1','id_competence' => '1']);
        factory(Intranet\Models\Question::class, 25)->create();
    }
}
