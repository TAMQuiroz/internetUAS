<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhaseTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_psp_cr_pha_01()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/psp/Phase/create')
    		->type(100,'numero')
    		->type('sdsdsfsdfs','descripcion')
    		->type('1992-08-20','fecha_inicio')
    		->type('1992-09-20','fecha_fin')
    		->press('Guardar')
    		->seePageIs('/psp/Phase')
    		->see('Phasees')
    		->see('La fase se ha registrado exitosamente');
    		
    }

    public function test_psp_cr_pha_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/Phase/create')
    		->type(13,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
    		->press('Guardar')
    		->seePageIs('/psp/Phase/create')
    		->see('Creación de Phase')
    		->see('El número debe tener como máximo un digito');
    }

    public function test_psp_cr_pha_03()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/Phase/create')
    		->type(NULL,'numero')
            ->type('djd','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
    		->press('Guardar')
    		->seePageIs('/psp/Phase/create')
    		->see('Creación de Phase')
    		->see('El campo número debe ser ingresado obligatoriamente');
    		
    }

    public function test_psp_cr_pha_04()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/Phase/create')
            ->type(-5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/Phase/create')
            ->see('Creación de Phase')
            ->see('El número debe ser mayor de cero');
            
    }

    public function test_psp_cr_pha_05()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/Phase/create')
    		->type(5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
    		->press('Guardar')
    		->seePageIs('/psp/Phase/create')
    		->see('Creación de Phase')
    		->see('La descripcion debe ser ingresada obligatoriamente');
    		
    }
    

    public function test_psp_cr_pha_06()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/Phase/create')
    		->type(4,'numero')
            ->type('slskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkk','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
    		->press('Guardar')
    		->seePageIs('/psp/Phase/create')
    		->see('Creación de Phase')
    		->see('La descripción debe tener como máximo 100 caracteres');
    }

    public function test_psp_cr_pha_07()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/Phase/create')
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type(NULL,'fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/Phase/create')
            ->see('Creación de Phase')
            ->see('La fecha de inicio de la fase es un campo obligatorio');
    }

    public function test_psp_cr_pha_08()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/Phase/create')
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type('1992-09-20','fecha_inicio')
            ->type(NULL,'fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/Phase/create')
            ->see('Creación de Phase')
            ->see('La fecha de fin de la fase es un campo obligatorio');
    }

    
}

