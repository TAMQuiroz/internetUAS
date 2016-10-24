<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\User;

class TopicTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tutoria_crear_tema_ok()
    {
        $teacher = Teacher::get()->first();;//cojo un coordinador de especialidad
        $user = User::find($teacher->IdUsuario);//tengo las credenciales de ese coordinador
    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => factory(Intranet\Models\Teacher::class)->make(),
            'faculty-code' => $teacher->IdEspecialidad
    		])->visit('/tutoria/temas/create')
       ->type('hola','nombre')
       ->press('Guardar')
       ->seePageIs('tutoria/temas/')
       ->see('Temas de Citas');  
    }

    public function test_tutoria_crear_tema_vacio()
    {
        $teacher = Teacher::get()->first();;//cojo un coordinador de especialidad
        $user = User::find($teacher->IdUsuario);//tengo las credenciales de ese coordinador
    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => factory(Intranet\Models\Teacher::class)->make(),
            'faculty-code' => $teacher->IdEspecialidad
    		])->visit('/tutoria/temas/create')       
       ->press('Guardar')
       ->seePageIs('tutoria/temas/create')
       ->see('Nuevo tema');  
    }
}
