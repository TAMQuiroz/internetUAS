<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

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
        $this->call(StatusTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(InvestigatorsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);

        $this->call(TopicsTableSeeder::class);
        $this->call(ReasonsTableSeeder::class);

        
        // $this->call(TutstudentsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);        
        $this->call(CompetenceTableSeeder::class);    

    }
}
