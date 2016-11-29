<?php

use Illuminate\Database\Seeder;

class TutorshipRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Docente')->where('IdDocente', 5)->update(['rolTutoria' => 2]);
        DB::table('Docente')->where('IdDocente', 6)->update(['rolTutoria' => 1]);

        //crear alumno
        $userAlumno = DB::table('Usuario')->where('IdUsuario',2)->first();
        if(!$userAlumno){
            DB::table('Usuario')->insert(['IdUsuario' => 2, 'IdPerfil' => 0, 'Usuario' => 45674568, 'Contrasena' => bcrypt(45674568)]);
        }

        $alumno = DB::table('tutstudents')->where('id',1)->first();
        if(!$alumno){
            DB::table('tutstudents')->insert(['id' => 1, 'id_usuario' => 2, 'codigo' => 45674568,'nombre' => 'Frodo', 'ape_paterno' => 'Bolson', 'ape_materno' => 'Comarca', 'correo' => 'bolson.frodo@pucp.pe', 'id_especialidad' => 5]);
        }

        $userAlumno = DB::table('Usuario')->where('IdUsuario',3)->first();
        if(!$userAlumno){
            DB::table('Usuario')->insert(['IdUsuario' => 3, 'IdPerfil' => 0, 'Usuario' => 45674569, 'Contrasena' => bcrypt(45674569)]);
        }

        $alumno = DB::table('tutstudents')->where('id',2)->first();
        if(!$alumno){
            DB::table('tutstudents')->insert(['id' => 2, 'id_usuario' => 3, 'codigo' => 45674569,'nombre' => 'Elliot', 'ape_paterno' => 'Anderson', 'ape_materno' => 'Wes', 'correo' => 'anderson.elliot@pucp.pe', 'id_especialidad' => 5]);
        }

        $userAlumno = DB::table('Usuario')->where('IdUsuario',4)->first();
        if(!$userAlumno){
            DB::table('Usuario')->insert(['IdUsuario' => 4, 'IdPerfil' => 0, 'Usuario' => 45674570, 'Contrasena' => bcrypt(45674570)]);
        }

        $alumno = DB::table('tutstudents')->where('id',3)->first();
        if(!$alumno){
            DB::table('tutstudents')->insert(['id' => 3, 'id_usuario' => 4, 'codigo' => 45674570,'nombre' => 'Tyrell', 'ape_paterno' => 'Wellick', 'ape_materno' => 'Bonsoir', 'correo' => 'wellick.tyrell@pucp.pe', 'id_especialidad' => 5]);
        }

    }
}
