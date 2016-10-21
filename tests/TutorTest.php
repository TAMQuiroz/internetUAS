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

	public function test_tutoria_asignar_tutor_ok()
	{        
        $teacher = Teacher::get()->first();;//cojo un coordinador de especialidad
        $user = User::find($teacher->IdUsuario);//tengo las credenciales de ese coordinador
    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => factory(Intranet\Models\Teacher::class)->make(),
            'faculty-code' => $teacher->IdEspecialidad
    		])->visit('/tutoria/tutores/create')
       ->check('check[1]')
       ->press('Guardar')
       ->seePageIs('tutoria/tutores/')
       ->see('Tutores');       
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

    public function test_tutoria_filter_tutor()
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


    public function test_tutoria_filter_tutstudent()
    {
      $teacher = Teacher::get()->first();

      $user = User::find($teacher->IdUsuario);

      $tutstudent_test = Tutstudent::getFilteredStudents($filters = ['code' => '', 'name' => 'franco', 'lastName' => 'tume', 'secondLastName' => '', 'tutorId' => ''],
        null, $teacher->IdEspecialidad);

      $this->actingAs($user)
            ->withSession([
              'actions' => [],
              'user' => factory(Intranet\Models\Teacher::class)->make(),
              'faculty-code' => $teacher->IdEspecialidad
            ])
            ->visit('/tutoria/alumnos?code=&name=franco&lastName=tume&secondLastName=&tutorId=')
            ->see('Franco')
            ->dontsee('Janet');
    }
}
