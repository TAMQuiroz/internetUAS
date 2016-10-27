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

    public function test_psp_cr_gro_01(){
    	$user = factory(Intranet\Models\User::class)->make();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('Es un grupo','descripcion')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/')
    		->see('El grupo se ha registrado exitosamente');
    }

    public function test_psp_cr_gro_02(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('11111','numero')
    		->type('Es un grupo','descripcion')    		
    		->press('Guardar')    		
            ->seePageIs('/psp/pspGroup/create')		
            ->see('numero no debe ser mayor a 9');
    }

    public function test_psp_cr_gro_03(){
        $user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
            ->type('-11111','numero')
            ->type('Es un grupo','descripcion')         
            ->press('Guardar')          
            ->seePageIs('/psp/pspGroup/create')     
            ->see('El tama&ntilde;o de numero debe ser de al menos 1');
    }

    public function test_psp_cr_gro_04(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('','numero')
    		->type('Es un grupo','descripcion') 
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')    		
    		->see('El campo numero es obligatorio');
    }

    public function test_psp_cr_gro_05(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('LUL','numero')
    		->type('Es un grupo','descripcion') 
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')    		
    		->see('numero debe ser num&eacute;rico');    
    }

    public function test_psp_cr_gro_06(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','descripcion')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_psp_cr_gro_07(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('','descripcion')  
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')
    		->see('El campo descripcion es obligatorio');
    }

    public function test_psp_cr_gro_08(){
    	$user = factory(Intranet\Models\User::class)->make();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('1','numero')
    		->type('$$$$$$','descripcion')  
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create')    		
    		->see('El formato de descripcion es inv&aacute;lido');
    }
    
    public function test_psp_ed_gro_01(){
        $user = factory(Intranet\Models\User::class)->make();
        $pspGroup = factory(Intranet\Models\PspGroup::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->type('Es un grupo','descripcion')
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/show/'.$pspGroup->id)
            ->see('El grupo se ha actualizado exitosamente');
    }

    public function test_psp_ed_gro_02(){
        $user = factory(Intranet\Models\User::class)->make();
        $pspGroup = factory(Intranet\Models\PspGroup::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->type('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','descripcion')
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_psp_ed_gro_03(){
        $user = factory(Intranet\Models\User::class)->make();
        $pspGroup = factory(Intranet\Models\PspGroup::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->type('','descripcion')  
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/edit/'.$pspGroup->id)
            ->see('El campo descripcion es obligatorio');
    }

    public function test_psp_ed_gro_04(){
        $user = factory(Intranet\Models\User::class)->make();
        $pspGroup = factory(Intranet\Models\PspGroup::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)
            ->type('$$$$$$','descripcion')  
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/edit/'.$pspGroup->id)         
            ->see('El formato de descripcion es inv&aacute;lido');
    }
    
}
