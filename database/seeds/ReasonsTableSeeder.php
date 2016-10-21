<?php

use Illuminate\Database\Seeder;

class ReasonsTableSeeder extends Seeder
{
    
    public function run()
    {
	/*  POR CANCELACION O RECHAZO DE CITA     */
        DB::table('reasons')->insert([
            'nombre' => 'Por reasignación de tutor',     /*INBORRABLE*/       
            'tipo' => 1,
        ]);
        DB::table('reasons')->insert([
            'nombre' => 'Por cambios en disponibilidad', /*INBORRABLE*/       
            'tipo' => 1,
        ]);
        DB::table('reasons')->insert([
            'nombre' => 'Otros',            
            'tipo' => 1,
        ]);
        DB::table('reasons')->insert([
            'nombre' => 'Por enfermedad',            
            'tipo' => 1,
        ]);
        /*  POR DESACTIVACIÓN DE TUTOR     */
        DB::table('reasons')->insert([
            'nombre' => 'Otros',
            'tipo' => 2,
        ]);

        DB::table('reasons')->insert([
            'nombre' => 'Por viaje',
            'tipo' => 2,
        ]);

        DB::table('reasons')->insert([
            'nombre' => 'Por despido',
            'tipo' => 2,
        ]);
    }
}
