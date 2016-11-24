<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class CompetencePresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('competences')->insert([
            'nombre'            =>  'Habilidades blandas',
            'descripcion'       =>  'Habilidades que permiten el desarrollo personal',
            'id_especialidad'   =>  5,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Artística',
            'descripcion'       =>  'Habilidad que permiten el desarrollo la comunicación social',
            'id_especialidad'   =>  5,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Cultura general',
            'descripcion'       =>  'Habilidad que permite medir el nivel cultural',
            'id_especialidad'   =>  5,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Razonamiento matemático',
            'descripcion'       =>  'Habilidad que permite medir las cualidades de raciocinio',
            'id_especialidad'   =>  5,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Razonamiento verbal',
            'descripcion'       =>  'Habilidad que permite medir las cualidades verbales',
            'id_especialidad'   =>  5,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Empatía',
            'descripcion'       =>  'Habilidad que permite reconocer la afeción hacia otras personas',
            'id_especialidad'   =>  5,
        ]);        


    }
}
