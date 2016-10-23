<?php

use Illuminate\Database\Seeder;

class CompetenceTableSeeder extends Seeder
{
    /**
     * Se crean las competencias de informatica
     */
    public function run()
    {
        factory(Intranet\Models\Competence::class, 8)->create();
    }
}
