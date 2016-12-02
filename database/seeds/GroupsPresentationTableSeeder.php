<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class GroupsPresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //factory(Intranet\Models\Group::class)->create();

    	//$usuario = DB::table('Usuario')->where('IdUsuario',50)->first();
    	//$docente = DB::table('Docente')->where('IdDocente',50)->first();
    	$grupo   = DB::table('groups')->where('id',1)->first();

    	/*
        if(!$usuario){
	        DB::table('Usuario')->insert([
	           	'IdUsuario' => 50,
	           	'IdPerfil'          => 2,
	        	'Usuario'           => 12345678,
	        	'Contrasena'        => bcrypt(123),
	        ]);
	    }
	    
	    if(!$docente){
	        DB::table('Docente')->insert([
	        	'IdDocente'			=>	50,
	        	'IdUsuario'			=>	50,
		    	'IdEspecialidad'    =>  1,
		    	'Codigo'	        =>	12345678,
		        'Nombre'            =>  $faker->firstNameMale,
		        'ApellidoPaterno'   =>	$faker->lastName,
		        'ApellidoMaterno'   =>	$faker->lastName,
		        'Correo'			=>	$faker->email,
		        'Cargo'				=>	$faker->text,
		        'Vigente'			=>	1,
		        'Descripcion'		=>	$faker->text,
	        ]);
        }
		*/

        if(!$grupo){
	        DB::table('groups')->insert([
	        	'id'				=> 1,
		        'nombre'            => 'GRUPO DE RECONOCIMIENTO DE PATRONES E INTELIGENCIA ARTIFICIAL APLICADA',
		        'id_especialidad'   => 5,
		        'descripcion'       => 'El GRPIAA-PUCP busca desarrollar aplicaciones e investigaciones en el área de reconocimiento de patrones e inteligencia artificial aplicada, orientados a la solución de problemas de la sociedad, buscando contribuir con el conocimiento especializado que se forma en la universidad para desarrollar proyectos interdisciplinarios entre la universidad y la empresa, contribuyendo en la formación de recurso especializado para la generación de conocimiento científico en el área.',
		        'id_lider'          => 6,
	        ]);
        }
    }
}
