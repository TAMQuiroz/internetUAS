<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PspProcessTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->assertTrue(true);
    }*/

    public function test_psp_ed_pp_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type(10,'Tamaño_Maximo_de_Archivo')
            ->type(10,'Numero_maximo_de_Fases')
            ->type(10,'Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/conf');
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

    public function test_psp_ed_pp_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type('','Tamaño_Maximo_de_Archivo')
            ->type(10,'Numero_maximo_de_Fases')
            ->type(10,'Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/confedit/'.$psp->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

    public function test_psp_ed_pp_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type(10,'Tamaño_Maximo_de_Archivo')
            ->type('','Numero_maximo_de_Fases')
            ->type(10,'Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/confedit/'.$psp->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

        public function test_psp_ed_pp_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type(10,'Tamaño_Maximo_de_Archivo')
            ->type(10,'Numero_maximo_de_Fases')
            ->type('','Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/confedit/'.$psp->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }


        public function test_psp_ed_pp_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type('aa','Tamaño_Maximo_de_Archivo')
            ->type(10,'Numero_maximo_de_Fases')
            ->type(10,'Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/confedit/'.$psp->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

        public function test_psp_ed_pp_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type(10,'Tamaño_Maximo_de_Archivo')
            ->type('aa','Numero_maximo_de_Fases')
            ->type(10,'Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/confedit/'.$psp->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }


        public function test_psp_ed_pp_07()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;
        $psp =   factory(Intranet\Models\PspProcess::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspProcess/confedit/'.$psp->id)
            ->type(10,'Tamaño_Maximo_de_Archivo')
            ->type(10,'Numero_maximo_de_Fases')
            ->type('aa','Numero_maximo_de_Plantillas')
            ->press('Guardar')
            ->seePageIs('/psp/pspProcess/confedit/'.$psp->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

}
