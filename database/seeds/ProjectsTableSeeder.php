<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
        	'id'				=> 1,
	        'nombre'            => 'Proyecto de prueba',
	        'descripcion'      	=> 'Proyecto de prueba en auditorio CIA',
	        'num_entregables' 	=> 4,
	        'fecha_ini'        	=> '2017-10-07',
	        'fecha_fin'        	=> '2017-10-10',
	        'id_grupo'         	=> 1,
	        'id_area'         	=> 1,
	        'id_status'         => 1,
        ]);
    }
}
