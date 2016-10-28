<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\User;

class TopicTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tut_topic_cr_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $teacher = factory(Intranet\Models\Teacher::class)->create();
    	  	
    	  $this->actingAs($user)
    	      ->withSession([
    		      'actions' => [],
    		      'user' => $user,
              'faculty-code' => $teacher->IdEspecialidad
    		      ])
            ->visit('/tutoria/parametros/temas/create')
       ->type('Académico','nombre')
       ->press('Guardar')
       ->seePageIs('/tutoria/parametros/temas/')
       ->see('Temas de Citas')
       ->see('El tema se ha registrado exitosamente');  
    }

    public function test_tut_topic_cr_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $teacher = factory(Intranet\Models\Teacher::class)->create();
          
        $this->actingAs($user)
            ->withSession([
              'actions' => [],
              'user' => $user,
              'faculty-code' => $teacher->IdEspecialidad
              ])
            ->visit('/tutoria/parametros/temas/create')
       ->type('$','nombre')
       ->press('Guardar')
       ->seePageIs('/tutoria/parametros/temas/create')
       ->see('Nuevo tema')
       ->see('El formato de nombre es inválido');  
    }

    public function test_tut_topic_cr_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $teacher = factory(Intranet\Models\Teacher::class)->create();
          
        $this->actingAs($user)
            ->withSession([
              'actions' => [],
              'user' => $user,
              'faculty-code' => $teacher->IdEspecialidad
              ])
            ->visit('/tutoria/parametros/temas/create')
       ->type('5','nombre')
       ->press('Guardar')
       ->seePageIs('/tutoria/parametros/temas/create')
       ->see('Nuevo tema')
       ->see('El formato de nombre es inválido');  
    }
}
