<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class InvestigatorsPresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        $usuario 		= DB::table('Usuario')->where('IdUsuario',51)->first();
    	$investigador 	= DB::table('investigators')->where('id',51)->first();

        if(!$usuario){
	        DB::table('Usuario')->insert([
	           	'IdUsuario' 		=> 51,
	           	'IdPerfil'          => 5,
	        	'Usuario'           => 87654321,
	        	'Contrasena'        => bcrypt(123),
	        ]);
	    }

	    if(!$investigador){
	        DB::table('investigators')->insert([
	           	'id_usuario'        => 51,
		        'nombre'            => $faker->firstNameMale,
		        'ape_paterno'       => $faker->lastName,
		        'ape_materno'       => $faker->lastName,
		        'correo'            => $faker->email,
		        'celular'           => 999999999,
		        'id_especialidad'   => 5,
		        'id_area'           => 1,
		        'Vigente'           => 1,
	        ]);
        }
    }
}
