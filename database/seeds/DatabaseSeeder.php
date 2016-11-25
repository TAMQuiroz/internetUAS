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
        /*
        $this->call(StatusTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(InvestigatorsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(DeliverablesTableSeeder::class);

        $this->call(TopicsTableSeeder::class);
        $this->call(ReasonsTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        
        $this->call(TeachersTableSeeder::class);
        $this->call(CompetenceTableSeeder::class);    
        $this->call(QuestionsTableSeeder::class);    

        //psp
        $this->call(PspProcessTableSeeder::class);
        $this->call(PspGroupTableSeeder::class);
        */

        //Seeders solo para presentacion
        
        $this->call(StatusTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(InvestigatorsPresentationTableSeeder::class);
        $this->call(GroupsPresentationTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(DeliverablesTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(ReasonsTableSeeder::class);

        $this->call(CompetencePresentationTableSeeder::class);    
        $this->call(QuestionsPresentationTableSeeder::class);  
        $this->call(TutorshipRolesSeeder::class);  

        $this->call(PspProcessPresentationTableSeeder::class);
        $this->call(PspGroupTableSeeder::class);
        $this->call(PspCriteriosPresentationTableSeeder::class);
        
    }
}
