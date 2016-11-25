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

        DB::table('phases')->insert([
            'id'            => 1,
            'numero'        =>  1,
            'descripcion'   =>  'test',
            'fecha_inicio'  =>  '2016-11-16',
            'fecha_fin'     =>  '2016-12-09',
            'idpspprocess'  =>  1,
        ]);

        DB::table('inscriptionfiles')->insert([
            'id'                    => 1,
            'tiene_convenio'        =>  0,
            'fecha_recep_convenio'  =>  '2016-11-25',
            'fecha_inicio'          =>  '2016-11-08',
            'fecha_termino'         =>  '2016-12-03',
            'activ_formativas'      =>  'asd',
            'razon_social'          =>  'asd',
            'actividad_economica'   =>  'asd',
            'direccion_empresa'     =>  'asd',
            'distrito_empresa'      =>  'asd',
            'nombre_area'           =>  1,
            'ubicacion_area'        =>  1,
            'equipamiento_area'     =>  1,
            'equi_del_practicante'  =>  1,
            'personal_area'         =>  1,
            'cond_seguridad_area'   =>  1,
            'Correo_jefe_directo'   =>  'asd@qwe.com',
            'telef_jefe_directo'    =>  '999999999',
            'jefe_directo_aux'      =>  'sad',
            'puesto'                =>  'asd',
            'recomendaciones'       =>  '',
            'deleted_at'            =>  NULL,
            'created_at'            =>  '2016-11-25 13:18:22',
            'updated_at'            =>  '2016-11-25 13:18:22',
        ]);

        DB::table('pspstudentsxinscriptionfiles')->insert([
            'id'                    =>  0,
            'idinscriptionfile'     =>  1,
            'idpspstudents'         =>  42,
            'acepta_terminos'       =>  1,
            'nota_final'            =>  0,
            'deleted_at'            =>  NULL,
            'created_at'            =>  '2016-11-25 13:48:22',
            'updated_at'            =>  '2016-11-25 13:48:22',
        ]);

    }
}
