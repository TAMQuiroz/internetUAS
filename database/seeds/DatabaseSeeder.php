<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(InvestigatorsTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
