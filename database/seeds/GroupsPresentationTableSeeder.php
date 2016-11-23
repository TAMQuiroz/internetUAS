<?php

use Illuminate\Database\Seeder;

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
		        'nombre'            => 'Grupo de prueba',
		        'id_especialidad'   => 1,
		        'descripcion'       => $faker->text,
		        'id_lider'          => 15,
	        ]);
        }
    }
}
