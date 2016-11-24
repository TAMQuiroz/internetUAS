<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert([
			'id'              =>  1,
			'duracionCita'    =>  15,	        
			'id_especialidad' =>  5,
			'start_date'      =>  '2016-08-01 23:00:00',
			'end_date'        =>  '2016-12-31 23:00:00',
			'number_days'     =>  14,
        ]);
    }
}
