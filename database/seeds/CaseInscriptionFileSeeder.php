<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Usuario')->insert([
            'IdUsuario'         => 65,
            'IdPerfil'          => 0,
            'Usuario'           => 20001234,
            'Contrasena'        => bcrypt(20001234),
        ]);

        DB::table('alumno')->insert([
        	'idAlumno'				=> 1,
	        //'idHorario'            => 1,
	        'Nombre'		=>  'Juan',
            'ApellidoPaterno'  => 'Perez',
            'ApellidoMaterno'  => 'Ramirez',
            'Codigo' => '20001234'
	        'idUsuario'     	=>   65,
	        'lleva_psp'    	=> 'S',
        ]);

        DB::table('pspstudents')->insert([
            'idAlumno'              => 1,
            'idHorario'            => 1,
            'idTipoestado'            => 1,
            'telefono'            => '123-4567',
            'correo'            => 'jemarroquin@pucp.edu.pe',
            'direccion'            => 'Av. Uni 123',
            'idespecialidad'            => 1,
        ]);


    }
}
