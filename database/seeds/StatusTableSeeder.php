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
        0   =>  Proyecto de Investigacion
        1   =>  Documentos de PSP
        2   =>  Estudiante de PSP
        3   =>  Reuniones de PSP
        4   =>  Templates
     */

    public function run()
    {
        //Proyecto de investigacion
        DB::table('statuses')->insert(['nombre' => 'En progreso', 'tipo_estado' => 0]);
        DB::table('statuses')->insert(['nombre' => 'Culminado satisfactoriamente', 'tipo_estado' => 0]);
        DB::table('statuses')->insert(['nombre' => 'Culminado tardiamente', 'tipo_estado' => 0]);
        DB::table('statuses')->insert(['nombre' => 'Suspendido', 'tipo_estado' => 0]);

        //Documentos de PSP
        DB::table('statuses')->insert(['nombre' => 'Pendiente', 'tipo_estado' => 1]);
        DB::table('statuses')->insert(['nombre' => 'Subido', 'tipo_estado' => 1]);
        DB::table('statuses')->insert(['nombre' => 'Revisado', 'tipo_estado' => 1]);

        //Estudiante de PSP
        DB::table('statuses')->insert(['nombre' => 'Suspendido', 'tipo_estado' => 2]);
        DB::table('statuses')->insert(['nombre' => 'Matriculado en PSP', 'tipo_estado' => 2]);
        DB::table('statuses')->insert(['nombre' => 'No matriculado en PSP', 'tipo_estado' => 2]);

        //Reuniones de PSP
        DB::table('statuses')->insert(['nombre' => 'Cancelada', 'tipo_estado' => 3]);
        DB::table('statuses')->insert(['nombre' => 'Pendiente', 'tipo_estado' => 3]);
        DB::table('statuses')->insert(['nombre' => 'Realizada', 'tipo_estado' => 3]);

        //Templates de PSP
        DB::table('statuses')->insert(['nombre' => 'Obligatorio', 'tipo_estado' => 4]);
        DB::table('statuses')->insert(['nombre' => 'Opcional', 'tipo_estado' => 4]);

        //Usuario
        DB::table('statuses')->insert(['nombre' => 'Suspendido', 'tipo_estado' => 5]);
    }
}

