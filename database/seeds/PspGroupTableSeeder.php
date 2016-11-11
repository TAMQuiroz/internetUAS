<?php

use Illuminate\Database\Seeder;

class PspGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pspgroups')->insert([
        	'numero' => 1, 
        	'descripcion' => 'Para los alumnos que ya realizaron su práctica supervisada',
    	]);
    	DB::table('pspgroups')->insert([
        	'numero' => 2, 
        	'descripcion' => 'Para los alumnos que para la semana cuatro aún no cumplen las 270 horas necesarias de prácticas',
    	]);
        
    }
}
