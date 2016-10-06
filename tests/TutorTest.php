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

	public function test_tutoria_asignar_tutor_01()
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
    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/tutoria/tutores/create')
    	  	->check('check[4]')    		
    	->press('Guardar')
    	->seePageIs('tutoria/dddddtutores/')
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
}
