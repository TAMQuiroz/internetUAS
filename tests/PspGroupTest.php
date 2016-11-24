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

    //CREAR

    public function test_psp_cr_gro_01(){
    	$user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/pspGroup/create')
    		->type('3','numero')
    		->type('Es un grupo','descripcion')
            ->select($psp->id,'Proceso_de_Psp')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/');    		
    }

    public function test_psp_cr_gro_02(){
    	$user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('11111','numero')
    		->type('Es un grupo','descripcion')
            ->select($psp->id,'Proceso_de_Psp')    		
    		->press('Guardar')    		
            ->seePageIs('/psp/pspGroup/create');
    }

    public function test_psp_cr_gro_03(){
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
            ->type('-11111','numero')
            ->type('Es un grupo','descripcion')
            ->select($psp->id,'Proceso_de_Psp')         
            ->press('Guardar')          
            ->seePageIs('/psp/pspGroup/create');
    }

    public function test_psp_cr_gro_04(){
    	$user = factory(Intranet\Models\User::class)->make();
         $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('','numero')
    		->type('Es un grupo','descripcion')
            ->select($psp->id,'Proceso_de_Psp') 
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create');    		
    }

    public function test_psp_cr_gro_05(){
    	$user = factory(Intranet\Models\User::class)->make();
         $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('LUL','numero')
    		->type('Es un grupo','descripcion')
            ->select($psp->id,'Proceso_de_Psp') 
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create');    		
    }

    public function test_psp_cr_gro_06(){
    	$user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('3','numero')
    		->type('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','descripcion')
            ->select($psp->id,'Proceso_de_Psp')
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create');
    }

    public function test_psp_cr_gro_07(){
    	$user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('3','numero')
    		->type('','descripcion')
            ->select($psp->id,'Proceso_de_Psp')  
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create');    		
    }

    public function test_psp_cr_gro_08(){
    	$user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
    		->type('3','numero')
    		->type('$$$$$$','descripcion')
            ->select($psp->id,'Proceso_de_Psp')  
    		->press('Guardar')
    		->seePageIs('/psp/pspGroup/create');
    }

    //Nuevo v2
    public function test_psp_cr_gro_09(){
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/create')
            ->type('1','numero')
            ->type('3','descripcion')
            ->select('','Proceso_de_Psp')  
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/create');
    }
    
    //EDITAR

    public function test_psp_ed_gro_01(){
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $pspGroup = factory(Intranet\Models\PspGroup::class)->create([
            'idpspprocess' => $psp->id,
            ]);
        //dd($pspGroup);
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->type('Es un grupo','descripcion')
            //->select($psp->id,'Proceso_de_Psp')
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/show/'.$pspGroup->id);            
    }

    public function test_psp_ed_gro_02(){
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $pspGroup = factory(Intranet\Models\PspGroup::class)->create([
            'idpspprocess' => $psp->id,
            ]);
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->type('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','descripcion')
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/edit/'.$pspGroup->id);
    }

    public function test_psp_ed_gro_03(){
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $pspGroup = factory(Intranet\Models\PspGroup::class)->create([
            'idpspprocess' => $psp->id,
            ]);
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)            
            ->type('','descripcion')  
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/edit/'.$pspGroup->id);
    }

    public function test_psp_ed_gro_04(){
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create();

        $pspGroup = factory(Intranet\Models\PspGroup::class)->create([
            'idpspprocess' => $psp->id,
            ]);
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspGroup/edit/'.$pspGroup->id)
            ->type('$$$$$$','descripcion')  
            ->press('Guardar')
            ->seePageIs('/psp/pspGroup/edit/'.$pspGroup->id);
    }
    
}
