<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
        0   =>  Proyecto
        1   =>  Documentos de PSP
        2   =>  Estudiante de PSP
        3   =>  Reuniones de PSP
        4   =>  Templates
        5   =>  Archivo de inscripcion

     */

    public function run()
    {
        DB::table('statuses')->insert(['nombre' => 'En progreso', 'tipo_estado' => 0]);
        DB::table('statuses')->insert(['nombre' => 'Culminado satisfactoriamente', 'tipo_estado' => 0]);
        DB::table('statuses')->insert(['nombre' => 'Culminado tardiamente', 'tipo_estado' => 0]);
        DB::table('statuses')->insert(['nombre' => 'Suspendido', 'tipo_estado' => 0]);
    }
}
