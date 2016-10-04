<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            'nombre' => 'Otro',            
        ]);

        DB::table('topics')->insert([
            'nombre' => 'Rendimiento académico',   
        ]);

    }
}
