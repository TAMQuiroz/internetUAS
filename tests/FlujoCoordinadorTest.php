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
    		])->visit('/flujoCoordinador/5/courses/create')
    		->type('INF666','coursecode')
    		->type('Del diablo','coursename')
    		->select('10','courseacademicLevel')
    		->press('Guardar')
    		->seePageIs('/flujoCoordinador/5/courses')
    		->see('El curso se ha registrado exitosamente');
    }

    public function test_acr_crear_curso_02(){
        $coord = factory(Intranet\Models\User::class,'coordinador_especialidad')->make();

        $this->actingAs($coord)
            ->withSession([
                'actions' => [],
                'user' => $coord
            ])->visit('/flujoCoordinador/5/courses/create')
            ->type('','coursecode')
            ->type('Del diablo','coursename')
            ->select('3','courseacademicLevel')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/courses/create');
    }

    public function test_acr_crear_curso_03(){
        $coord = factory(Intranet\Models\User::class,'coordinador_especialidad')->make();

        $this->actingAs($coord)
            ->withSession([
                'actions' => [],
                'user' => $coord
            ])->visit('/flujoCoordinador/5/courses/create')
            ->type('INF666','coursecode')
            ->type('','coursename')
            ->select('8','courseacademicLevel')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/courses/create');
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
    public function test_acr_crear_profesor2_01(){ //Correcto

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/profesor/create')
            ->select('22222222','teachercode')
            ->select('Nombre','teachername')
            ->select('Apellido1','teacherlastname')
            ->select('Apellido2','teachersecondlastname')
            ->select('test1@correo.com','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/profesor')
            ->see('El profesor se ha registrado exitosamente');
    } //FUNCIONA BIEN

    public function test_acr_crear_profesor2_02(){ //Codigo muy largo

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/profesor/create')
            ->select('222222222222','teachercode')
            ->select('Nombre','teachername')
            ->select('Apellido1','teacherlastname')
            ->select('Apellido2','teachersecondlastname')
            ->select('test1@correo.com','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/profesor/create');
    } //FALLA, FALTA VALIDAR POR BACK LA CANT DE CARACTERES

    public function test_acr_crear_profesor2_03(){ //Correo no tiene formato

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/profesor/create')
            ->select('22222222','teachercode')
            ->select('Nombre','teachername')
            ->select('Apellido1','teacherlastname')
            ->select('Apellido2','teachersecondlastname')
            ->select('test1correocom','teacheremail')
            ->select('Profesor Asociado','teacherposition')
            ->select('algo','teacherdescription')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/profesor/create');
    } //FALLA, FALTA VALIDAR POR BACK EL CORREO
    
    public function test_acr_crear_objetivo_01(){

        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/objetivoEducacional/create')
            ->select('ObjetivoCreado','descripcion')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/objetivoEducacional')
            ->see('El objetivo educacional se ha registrado exitosamente');
    } //FUNCIONA BIEN

    public function test_acr_crear_objetivo_02(){
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/objetivoEducacional/create')
            ->select('','descripcion')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/objetivoEducacional/create');
    } //FUNCIONA BIEN
    //De BlackFlyff


    public function test_acr_crear_resultado_01(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/studentResult/create')
            ->select("Z",'identifier')
            ->select('Res1','description')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/studentResult');
    }



    public function test_acr_crear_instrumento_01(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/instrumento/create')
            ->select("instrumento1",'nombre')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/instrumento')
            ->see('El instrumento se ha registrado exitosamente');
    }

    public function test_acr_crear_instrumento_02(){

        $user = factory(Intranet\Models\User::class)->make();
        //$facultad = factory(Intranet\Models\Faculty::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/instrumento/create')
            ->select('','nombre')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/instrumento/create');
    }

    public function test_acr_crear_cursoDelCiclo_01(){  //no sale

        $user = factory(Intranet\Models\User::class)->make();
        //$docente  = factory(Intranet\Models\Teacher::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/flujoCoordinador/5/horario/78/create')
            ->select(15,'idT')
            ->select(78,'courseId')
            ->type('h122','codeT')
            ->type(6,'teacher[]')
            ->press('Guardar')
            ->seePageIs('/flujoCoordinador/5/horario/78')
            ->see('Se registró el horario con éxito');
    }

    
}
