<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;

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
    	
        $coord = factory(Intranet\Models\User::class,'coordinador_especialidad')->make();

    	$this->actingAs($coord)
            ->withSession([
	    		'actions' => [],
	    		'user' => $coord
    		])->visit('/flujoCoordinador/1/courses/create')
    		->type('INF666','coursecode')
    		->type('Del diablo','coursename')
    		->select('10','courseacademicLevel')
    		->select('1','facultycode')
    		->press('Guardar')
    		->seePageIs('/flujoCoordinador/1/courses/')
    		->see('El curso se ha registrado exitosamente');
    }

    public function test_acr_crear_curso_02(){
        $coord = factory(Intranet\Models\User::class,'coordinador_especialidad')->make();

        $this->actingAs($coord)
            ->withSession([
                'actions' => [],
                'user' => $coord
            ])->visit('/flujoCoordinador/1/courses/create')
            ->type('','coursecode')
            ->type('Del diablo','coursename')
            ->select('13','courseacademicLevel')
            ->select('1','facultycode')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/courses/create');
    }

    public function test_acr_crear_curso_03(){
        $coord = factory(Intranet\Models\User::class,'coordinador_especialidad')->make();

        $this->actingAs($coord)
            ->withSession([
                'actions' => [],
                'user' => $coord
            ])->visit('/flujoCoordinador/1/courses/create')
            ->type('INF666','coursecode')
            ->type('','coursename')
            ->select('13','courseacademicLevel')
            ->select('1','facultycode')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/courses/create');
    }
    /*
    public function test_acr_crear_curso_04(){
        $coord = factory(Intranet\Models\User::class,'coordinador_especialidad')->make();

        $this->actingAs($coord)
            ->withSession([
                'actions' => [],
                'user' => $coord
            ])->visit('/flujoCoordinador/1/courses/create')
            ->type('INF666','coursecode')
            ->type('Del diablo','coursename')
            ->select('13','courseacademicLevel')
            ->select('','facultycode')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/courses/create');
    }
    */

    //De BlackFlyff
    public function test_uas_crear_profesor2_01(){ //Correcto

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
            ->select('test1@correo.com','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/profesor')
            ->see('El profesor se ha registrado exitosamente');
    } //FUNCIONA BIEN

    public function test_uas_crear_profesor2_02(){ //Codigo muy largo

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/1/profesor/create')
            ->select('222222222222','teachercode')
            ->select('Nombre','teachername')
            ->select('Apellido1','teacherlastname')
            ->select('Apellido2','teachersecondlastname')
            ->select('test1@correo.com','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/profesor/create');
    } //FALLA, FALTA VALIDAR POR BACK LA CANT DE CARACTERES

    public function test_uas_crear_profesor2_03(){ //Correo no tiene formato

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
            ->select('test1correocom','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/1/profesor/create');
    } //FALLA, FALTA VALIDAR POR BACK EL CORREO
    
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
    } //FUNCIONA BIEN

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
    } //FUNCIONA BIEN
    //De BlackFlyff

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
