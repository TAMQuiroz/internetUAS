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
            ])->visit('/psp/phase/create')
            ->type(1,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase')
            ->see('Fase')
            ->see('La fase se ha registrado exitosamente');

    }


    public function test_psp_cr_pha_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(13,'numero')
            ->type('sdsdsfsdfs','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
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

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(NULL,'numero')
            ->type('djd','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo numero es obligatorio');
            
    }

    public function test_psp_cr_pha_04()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(-5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('numero debe tener 1 dígitos');
            
    }

    public function test_psp_cr_pha_05()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(5,'numero')
            ->type('','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo descripcion es obligatorio');
            
    }
    
    /*
    public function test_psp_cr_pha_06()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
<<<<<<< HEAD
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(4,'numero')
            ->type('slskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkk','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('descripción no debe ser mayor que 100 caracteres');
=======
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/psp/phase/create')
    		->type(4,'numero')
            ->type('slskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkkslskkk','descripcion')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
    		->press('Guardar')
    		->seePageIs('/psp/phase/create')
    		->see('Creación de Fase')
    		->see('descripción no debe ser mayor que 100 caracteres');
>>>>>>> 43adb5831350cd36197cac583b753bb4b70cf449
    }*/

    public function test_psp_cr_pha_07()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type(NULL,'fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo fecha inicio es obligatorio');
    }

    public function test_psp_cr_pha_08()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/psp/phase/create')
            ->type(4,'numero')
            ->type('DSDDDDDDsdsds','descripcion')
            ->type('1992-09-20','fecha_inicio')
            ->type(NULL,'fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/phase/create')
            ->see('Creación de Fase')
            ->see('El campo fecha fin es obligatorio');
    }

    
}

