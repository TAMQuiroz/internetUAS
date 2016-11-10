<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhaseTest extends TestCase
{
    use DatabaseMigrations;
    /*
    public function testExample()
    {
        $this->assertTrue(true);
    }
*/
    public function test_psp_cr_pha_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(1,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')            
            ->press('Guardar')
            ->seePageIs('/psp/phase')
            ->see('Fase')
            ->see('La fase se ha registrado exitosamente');
    }


    public function test_psp_cr_pha_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(13,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')   
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('numero debe tener 1 dígitos')
    		->press('Guardar')
    		->seePageIs('/psp/phase/create')
    		->see('Creación de Fase')
    		->see('numero debe tener 1 dígitos');
    }

    public function test_psp_cr_pha_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(NULL,'numero')
            ->type('djd','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')  
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo numero es obligatorio');
            
    }

    public function test_psp_cr_pha_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(-5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')  
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('numero debe tener 1 dígitos');
            
    }

    public function test_psp_cr_pha_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')  
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo descripcion es obligatorio');
            
    }
    
    public function test_psp_cr_pha_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type(NULL,'fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo fecha inicio es obligatorio');
    }

    public function test_psp_cr_pha_07()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/create')
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type('1992-09-20','fecha_inicio')
            ->type(NULL,'fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo fecha fin es obligatorio');
    }

        public function test_psp_ed_pha_01()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(1,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')
            ->press('Guardar')
            ->seePageIs('/psp/phase')
            ->see('Fase');
    }

    public function test_psp_ed_pha_02()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(13,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/edit/'.$phase->id)
            ->see('Fase');
    }

    public function test_psp_ed_pha_03()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(NULL,'numero')
            ->type('djd','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/edit/'.$phase->id)
            ->see('Fase');
    }

    public function test_psp_ed_pha_04()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(-5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp')
            ->press('Guardar')
            ->seePageIs('/psp/phase/edit/'.$phase->id)
            ->see('Fase');
    }

    public function test_psp_ed_pha_05()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/edit/'.$phase->id)
            ->see('Fase');
    }

    public function test_psp_ed_pha_06()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type(NULL,'fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/edit/'.$phase->id)
            ->see('Fase');
    }

    public function test_psp_ed_pha_07()
    {
        $phase = factory(Intranet\Models\Phase::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp = factory(Intranet\Models\PspProcess::class)->create(); 

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/phase/edit/'.$phase->id)
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type('1992-09-20','fecha_inicio')
            ->type(NULL,'fecha_fin')
            ->select($psp->id, 'Proceso_de_Psp') 
            ->press('Guardar')
            ->seePageIs('/psp/phase/edit/'.$phase->id)
            ->see('Fase');
    }   
    
}

