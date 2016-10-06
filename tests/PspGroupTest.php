<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PspGroupTest extends TestCase
{
	use DatabaseMigrations;   


    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_cr_gro_01(){
    	$user = factory(Intranet\Models\User::class)->make();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('Es un grupo','observacion')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/')
    		->see('Lista de Grupos')
    		->see('El grupo se ha registrado exitosamente');
    }

    public function test_cr_gro_02(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('11','numero')
    		->type('Es un grupo','observacion')    		
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Creacion de Grupos')
    		->see('El numero de grupo debe tener 1 sola cifra');
    }

    public function test_cr_gro_03(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('','numero')
    		->type('Es un grupo','observacion')    		
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Nuevo Grupo')
    		->see('El campo numero es obligatorio');
    }

    public function test_cr_gro_04(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('LUL','numero')
    		->type('Es un grupo','observacion')    		
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Nuevo Grupo')
    		->see('Debe ingresar solo numeros');    
    }

    public function test_cr_gro_05(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('O-oooooooooo AAAAE-A-A-I-A-U- JO-oooooooooooo AAE-O-A-A-U-U-A- E-eee-ee-eee AAAAE-A-E-I-E-A- JO-ooo-oo-oo-oo EEEEO-A-AAA-AAAA','observacion')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Grupos')
    		->see('Observacion no debe ser mayor que 50 caracteres');
    }

    public function test_cr_gro_06(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('','observacion')    		
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Grupos')
    		->see('El campo observacion es obligatorio');
    }

    public function test_cr_gro_07(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('$$$$$$','observacion')    		
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Grupos')
    		->see('El grupo se ha registrado exitosamente');
    }

    public function test_cr_gro_08(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('420','observacion')    		
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('Grupos')
    		->see('El formato de observacion es inválido');
    }
}
