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
        factory(Intranet\Models\Investigator::class, 5)->create();
    }
}
