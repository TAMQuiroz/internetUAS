<?php

use Illuminate\Database\Seeder;

class TutstudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Intranet\Models\Tutstudent::class, 10)->create();        
    }
}
