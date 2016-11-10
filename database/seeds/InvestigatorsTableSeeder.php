<?php

use Illuminate\Database\Seeder;

class InvestigatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$usuario 		= DB::table('Usuario')->where('IdUsuario',51)->first();
    	$investigador 	= DB::table('investigators')->where('id',51)->first();

        if(!$usuario){
	        DB::table('Usuario')->insert([
	           	'IdUsuario' 		=> 51,
	           	'IdPerfil'          => 5,
	        	'Usuario'           => 87654321,
	        	'Contrasena'        => bcrypt(123),
	        ]);
	    }

	    if(!$investigador){
	        factory(Intranet\Models\Investigator::class, 1)->create();
        }
        
    }
}
