<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Intranet\Models\Tutstudent;
use Symfony\Component\DomCrawler\Field\ChoiceFormField;
use Symfony\Component\DomCrawler\Crawler;

class TutorTest extends TestCase
{
	use DatabaseMigrations;
	use WithoutMiddleware;

	public function test_tut_tutor_asigna_01()
	{        
        $user     = factory(Intranet\Models\User::class)->make();
        $teacher  = factory(Intranet\Models\Teacher::class)->create();
        $teachers = factory(Intranet\Models\Teacher::class, 5)->create();
    	  	
    	$this->actingAs($user)
    	    ->withSession([
    		    'actions' => [],
    		    'user' => $user,
            'faculty-code' => $teacher->IdEspecialidad
    		    ])
          ->visit('/tutoria/tutores/create')
          ->check('check[1]')
          ->press('Guardar')
          ->seePageIs('tutoria/tutores/')
          ->see('Tutores')
          ->see('Se guardaron los tutores exitosamente');       
    }

    public function test_tut_tutor_asigna_02()
    {
        $user     = factory(Intranet\Models\User::class)->make();
        $teacher  = factory(Intranet\Models\Teacher::class)->create();
        $teachers = factory(Intranet\Models\Teacher::class, 5)->create();
          
      $this->actingAs($user)
          ->withSession([
            'actions' => [],
            'user' => $user,
            'faculty-code' => $teacher->IdEspecialidad
            ])
          ->visit('/tutoria/tutores/create')
          ->press('Guardar')
          ->seePageIs('tutoria/tutores/')
          ->see('Tutores');
    }

    public function test_tut_tutor_filtra_03()
    {
        $user     = factory(Intranet\Models\User::class)->make();
        $teacher  = factory(Intranet\Models\Teacher::class)->create();
        $teachers = factory(Intranet\Models\Teacher::class, 5)->create();

        $parameters = 'name='.$teacher->Nombre.'&'.
                      'lastName='.$teacher->ApellidoPaterno.'&'.
                      'secondLastName='.'';

        $this->actingAs($user)
            ->withSession([
              'actions' => [],
              'user' => factory(Intranet\Models\Teacher::class)->make(),
              'faculty-code' => $teacher->IdEspecialidad
            ])
            ->visit('/tutoria/tutores?'.$parameters)
            ->see('Tutores');
    }
}
