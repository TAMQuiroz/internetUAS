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
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);

        DB::table('competences')->insert([
            'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
            'descripcion'       =>  $faker->text,
            'id_especialidad'   =>  15,
        ]);
    }
}
