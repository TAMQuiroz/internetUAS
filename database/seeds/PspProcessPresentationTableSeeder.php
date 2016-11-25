<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class PspProcessPresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		DB::table('pspprocesses')->insert([
            'id'        =>  1,
            'numero_Fases' => 0,
            'numero_Plantillas' => 0,
            'max_tam_plantilla' => 0,
            'idespecialidad' => 5,
            'idcurso' => 87,
            'idCiclo' => 3,
        ]);

		DB::table('pspprocessesxdocente')->insert([   //crear profesor del curso
            'idpspprocess' => 1,
            'iddocente' => 6,
        ]);        

        //crear supervisor
        $faker = Faker::create();
        $usuario = DB::table('Usuario')->where('IdUsuario',40)->first();

        if(!$usuario){
            DB::table('Usuario')->insert([
                'IdUsuario' => 40,
                'IdPerfil'          => 6,
                'Usuario'           => 20112189,
                'Contrasena'        => bcrypt(20112189),
            ]);
        }

        $supervisor = DB::table('supervisors')->where('id',40)->first();
        if(!$supervisor){
            DB::table('supervisors')->insert([
                'id'                =>  40,
                'nombres'            =>  $faker->firstNameMale,
                'apellido_paterno'   =>  $faker->lastName,
                'apellido_materno'   =>  $faker->lastName,
                'correo'            =>  $faker->email,
                'direccion'         =>  'av 123',
                'telefono'          => 123412341,
                'codigo_trabajador' => 20112189,
                'idfaculty'         =>  5,
                'iduser'            =>  40,
                'idpspprocess'      =>  1,
                'vigente'           =>  1,
            ]);

            DB::table('pspprocessesxsupervisors')->insert([   
                'idpspprocess' => 1,
                'idsupervisor' => 40,
            ]); 
        }

        //crear alumno
        $userAlumno = DB::table('Usuario')->where('IdUsuario',41)->first();

        if(!$userAlumno){
            DB::table('Usuario')->insert([
                'IdUsuario'         => 41,
                'IdPerfil'          => 0,
                'Usuario'           => 45674567,
                'Contrasena'        => bcrypt(45674567),
            ]);
        }

        $alumno = DB::table('tutstudents')->where('codigo',45674567)->first();

        if(!$alumno){
            DB::table('tutstudents')->insert([
                'id'         => 41,
                'id_usuario'     =>  41,
                'codigo'           => 45674567,
                'nombre'            =>  'Juan',
                'ape_paterno'   =>  'Perez',
                'ape_materno'   =>  'Perez',
                'correo'            =>  'asdsad@dajsd.com',
                'id_especialidad'   =>  5,
            ]);
        }

        
        $alumnoUAS = DB::table('Alumno')->where('IdAlumno',41)->first();

        if(!$alumnoUAS){
            DB::table('Alumno')->insert([
                'IdAlumno'         => 41,
                'Codigo'           => 45674567,
                'Nombre'            =>  'Juan',
                'ApellidoPaterno'   =>  'Perez',
                'ApellidoMaterno'   =>  'Perez',
                'IdUsuario'   =>  41,
                'IdHorario'     =>  7,
                'lleva_psp'     =>  1,
            ]);
        }

        $alumnoPSP = DB::table('pspstudents')->where('id',41)->first();

        if(!$alumnoPSP){
            DB::table('pspstudents')->insert([
                'id'         => 41,
                'idalumno'      =>  41,
                'idespecialidad'    =>  5,
                'idpspprocess'  =>  1,
            ]);
        }
    }
}
