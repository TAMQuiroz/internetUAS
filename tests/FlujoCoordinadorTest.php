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


    public function test_uas_crear_profesor2_01(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/1/profesor/create')
            ->select('22222222','teachercode')
            ->select('Nombre','teachername')
            ->select('Apellido1','teacherlastname')
            ->select('Apellido2','teachersecondlastname')
            ->select('testo@correo.com','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/facultad/2/profesor')
            ->see('El profesor se ha registrado exitosamente');
    }

    public function test_uas_crear_objetivo_01(){

        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/1/objetivoEducacional/create')
            ->select('ObjetivoCreado','descripcion')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/objetivoEducacional')
            ->see('El objetivo educacional se ha registrado exitosamente');
    }

    public function test_uas_crear_objetivo_02(){
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/1/objetivoEducacional/create')
            ->select('','descripcion')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/objetivoEducacional/create');
    }

    ////de melgar01 flujo Coordinador ---no funciona todavia

    public function test_uas_crear_aspecto_01(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/1/aspect/create')
            ->select("J - Conocer temas de actualidad",'aspect_id')
            ->select('Super aspecto','aspect_new_name')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/aspect')
            ->see('El aspecto se ha registrado exitosamente');
    }

    //////hasta aca es de melgar01


    
}
