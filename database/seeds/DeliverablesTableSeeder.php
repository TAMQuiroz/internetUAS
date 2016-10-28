<?php

use Illuminate\Database\Seeder;

class DeliverablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliverables')->insert([
        	'id'				=> 1,
	        'nombre'            => 'Entregable de prueba',
	        'id_proyecto'		=> 1,
	        'fecha_inicio'     	=> '2017-10-08',
	        'fecha_limite'    	=> '2017-10-09',
	        'porcen_avance'     => 0,
        ]);
    }
}
