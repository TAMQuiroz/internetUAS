<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;
use Intranet\Models\Faculty;

class FlujoAdministradorTest extends TestCase
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
	
	
    public function test_uas_crear_cicloacademico_01(){

    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/flujoAdministrador/academicCycle/create')
    		->select('2020','anio')
    		->select('2','numberC')
    		->press('Guardar')
    		->seePageIs('/flujoAdministrador/academicCycle/')
    		->see('El ciclo académico se ha registrado exitosamente');
    }
    

    public function test_uas_crear_cicloacademico_02(){
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoAdministrador/academicCycle/create')
            ->select('0','anio')
            ->select('1','numberC')
            ->press('Guardar')
            ->seePageIs('/flujoAdministrador/academicCycle/create');
    }

    public function test_uas_crear_cicloacademico_03(){
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoAdministrador/academicCycle/create')
            ->select('2020','anio')
            ->select('3','numberC')
            ->press('Guardar')
            ->seePageIs('/flujoAdministrador/academicCycle/create');
    }

    public function test_uas_crear_profesor_01(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoAdministrador/facultad/5/profesor/create')
            ->select('11111111','teachercode')
            ->select('Papu test','teachername')
            ->select('app','teacherlastname')
            ->select('apm','teachersecondlastname')
            ->select('papu@correo.com','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoAdministrador/facultad/5/profesor')
            ->see('El profesor se ha registrado exitosamente');
    }

    public function test_uas_crear_facultad_01(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoAdministrador/facultad')
            ->select('DIS','code')
            ->select('Diseño','name')
            ->select('holi','description')
            ->press('Siguiente')
            ->seePageIs('/flujoAdministrador/facultad/6/profesor');
    }

}
