<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Symfony\Component\DomCrawler\Field\ChoiceFormField;
use Symfony\Component\DomCrawler\Crawler;

class TutorTest extends TestCase
{
	use DatabaseMigrations;
	use WithoutMiddleware;

	public function test_tutoria_asignar_tutor_ok()
	{
        
        $teacher = Teacher::get()->first();;//cojo un coordinador de especialidad
        $user = User::find($teacher->IdUsuario);//tengo las credenciales de ese coordinador
        

		
        

    	// $this->actingAs($user)//entro al sistema con ese usuario
    	// ->withSession([
    	// 	'actions' => [],
    	// 	'user' => factory(Intranet\Models\Teacher::class)->make()
    	// 	])->visit('/tutoria/tutores/create');
    	// $form = $this->get('formulario');
    	// $crawler = new Crawler($form);
    	// $att = $crawler->attr('name');


    	// $this->assertEquals($att,'_token');
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => factory(Intranet\Models\Teacher::class)->make(),
            'faculty-code' => $teacher->IdEspecialidad
    		])->visit('/tutoria/tutores/create')
       ->check('check[1]')        
       ->press('Guardar')
       ->seePageIs('tutoria/tutores/')
       ->see('Tutores')
       ->see('Se guardaron los tutores exitosamente');


		// $crawler->filter('checkbox')->first();
  //   	foreach ($crawler as $domElement) {
  //   		var_dump($domElement->nodeName);
  //   	}

  //   	$check = $form->get('check[4]');
  //   	$check->tick();
  //   		// ->check('check[4]')    		
  //   	$this->press('Guardar')
  //   	->seePageIs('/tutoria/tutores/')
  //   	->see('Tutores')
  //   	->see('Se guardaron los tutores exitosamente');
    }

    public function test_tutoria_no_asignar_tutor()
    {
        $teacher = Teacher::get()->first();;//cojo un coordinador de especialidad
        $user = User::find($teacher->IdUsuario);//tengo las credenciales de ese coordinador
        $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => factory(Intranet\Models\Teacher::class)->make()
        ])->visit('/tutoria/tutores/create')         
      ->press('Guardar')
      ->seePageIs('tutoria/tutores/')
      ->see('Tutores')
      ->dontSee('Se guardaron los tutores exitosamente');
    }

    public function test_filter_tutor()
    {
      $teacher = Teacher::get()->first();

      $user = User::find($teacher->IdUsuario);

      $tutors_test = Teacher::getTutorsFiltered($is_tutor = true, $filters = ['lastName' => 'agu'], $teacher->IdEspecialidad);

      $this->actingAs($user)
            ->withSession([
              'actions' => [],
              'user' => factory(Intranet\Models\Teacher::class)->make(),
              'faculty-code' => $teacher->IdEspecialidad
            ])
            ->visit('/tutoria/tutores?name=&secondLastName=&lastName=agui')
            ->see('Aguilera')
            ->dontSee('Flores');
    }
}
