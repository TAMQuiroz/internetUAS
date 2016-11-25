<?php

use Illuminate\Database\Seeder;

class PspCriteriosPresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pspcriterios')->insert([
            'id'                    =>  1,
            'nombre'     			=>  'Criterio uno',
            'id_pspprocess'         =>  1,
            'peso'       			=>  4,
            'deleted_at'            =>  NULL,
            'created_at'            =>  '2016-11-25 16:09:24',
            'updated_at'            =>  '2016-11-25 16:09:24',
        ]);

        DB::table('pspcriterios')->insert([
            'id'                    =>  2,
            'nombre'     			=>  'Criterio dos',
            'id_pspprocess'         =>  1,
            'peso'       			=>  3,
            'deleted_at'            =>  NULL,
            'created_at'            =>  '2016-11-25 16:09:24',
            'updated_at'            =>  '2016-11-25 16:09:24',
        ]);

        DB::table('pspcriterios')->insert([
            'id'                    =>  3,
            'nombre'     			=>  'Criterio tres',
            'id_pspprocess'         =>  1,
            'peso'       			=>  2,
            'deleted_at'            =>  NULL,
            'created_at'            =>  '2016-11-25 16:09:24',
            'updated_at'            =>  '2016-11-25 16:09:24',
        ]);
    }
}
