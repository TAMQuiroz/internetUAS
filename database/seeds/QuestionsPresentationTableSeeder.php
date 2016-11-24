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
	        'tiempo'             =>  4,
	        'puntaje'            =>  10,
	        'dificultad'         =>  2,
	        'descripcion'        =>  '¿Cuál sería su enfoque para resolver un inconveniente con su profesor del curso?',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  1,
        ]);

		DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  5,
	        'dificultad'         =>  2,
	        'descripcion'        =>  '¿Que sugiere el estilo barroco y mencione tres representantes?',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  2,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  4,
	        'dificultad'         =>  1,
	        'descripcion'        =>  '¿Cuál es el área territorial del Perú',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  3,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  3,
	        'puntaje'            =>  7,
	        'dificultad'         =>  3,
	        'descripcion'        =>  'A un árbol subí donde manzanas habían, manzanas no comí ni manzanas dejé. ¿Cúantas manzanas habían?',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  4,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  1,
	        'puntaje'            =>  2,
	        'dificultad'         =>  1,
	        'descripcion'        =>  'Escriba una analogía',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  5,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  3,
	        'puntaje'            =>  5,
	        'dificultad'         =>  2,
	        'descripcion'        =>  '¿Cuanto le gusta involucrarse en los problemas de los demás?',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  6,
        ]);

        DB::table('questions')->insert([
	        'tipo'               =>  2,
	        'tiempo'             =>  2,
	        'puntaje'            =>  4,
	        'dificultad'         =>  3,
	        'descripcion'        =>  '¿Como resuelve un conflicto entre miembros de un equipo de trabajo?',
	        'requisito'          =>  '',
	        'id_especialidad'    =>  5,
	        'id_docente'         =>  6,
	        'id_competence'      =>  1,
        ]);
        
        
    }
}
