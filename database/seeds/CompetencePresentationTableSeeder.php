<?php

use Illuminate\Database\Seeder;

class CompetencePresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competences')->insert([
        	'id'				=> 1,
	        'nombre'            => 'Grupo de prueba',
	        'id_especialidad'   => 1,
	        'descripcion'       => $faker->text,
	        'id_lider'          => 15,
        ]);
    }
}
