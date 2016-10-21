<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
        	'id'				=> 1,
	        'nombre'            => 'Evento de prueba',
	        'ubicacion'         => 'Auditorio CIA',
	        'descripcion'      	=> 'Evento de prueba en auditorio CIA',
	        'fecha'         	=> '07/10/2017',
	        'hora'         		=> 0,
	        'duracion'         	=> 1,
	        'tipo'         		=> 'Evento de prueba',
	        'id_grupo'         	=> 1,
        ]);
    }
}
