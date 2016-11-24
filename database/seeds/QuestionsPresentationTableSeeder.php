<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class QuestionsPresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  1,
        ]);

		DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  2,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  3,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  4,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  5,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  6,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  1,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  2,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  3,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  4,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  5,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  1,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  15,
	        'id_docente'         =>  6,
	        'id_competence'      =>  6,
        ]);
        
    }
}
