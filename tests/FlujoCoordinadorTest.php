<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FlujoCoordinadorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_acr_crear_curso_01(){
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/flujoCoordinador/1/courses/create')
    		->type('INF666','courseCode')
    		->type('Del diablo','coursename')
    		->type('10','courseacademicLevel')
    		->select('1','facultycode')
    		->press('Guardar')
    		->seePageIs('/flujoCoordinador/1/courses')
    		->see('El curso se ha registrado exitosamente');
    }
}
