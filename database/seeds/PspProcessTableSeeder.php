<?php

use Illuminate\Database\Seeder;

class PspProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pspprocesses')->insert([
            'numero_Fases' => 0,
            'numero_Plantillas' => 0,
            'max_tam_plantilla' => 0,
            'idespecialidad' => 1,
            'idcurso' => 38,
            'idCiclo' => 1,
        ]);

		DB::table('pspprocessesxdocente')->insert([   //crear profesor del curso
            'idpspprocess' => 1,
            'iddocente' => 4,
        ]);        

        //crear alumno

        //crear supervisor
    }
}
