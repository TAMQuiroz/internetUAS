<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;

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
    		->select('1','numberC')
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
            ->seePageIs('/flujoAdministrador/academicCycle/create/')
            ->see('Debe seleccionar el año del ciclo');
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
            ->seePageIs('/flujoAdministrador/academicCycle/create/')
            ->see('Debe seleccionar el número del ciclo');
    }

}
