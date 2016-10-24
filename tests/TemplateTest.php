<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TemplateTest extends TestCase
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

    public function test_psp_cr_tem_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/create')
            ->select($fase->id, 'fase')
            ->type('Plantilla','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/template')
            ->see('Documentos');           
    }

    public function test_psp_cr_tem_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/create')
            ->select($fase->id, 'fase')
            ->type('Plantilla','titulo')
            ->attach(asset('images/1.png'),'ruta')
            ->check('obligatorio')
            ->press('Guardar')
            ->seePageIs('/psp/template')
            ->see('Documentos');           
    }

    public function test_psp_cr_tem_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $fase  = factory(Intranet\Models\Phase::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/template/create')
    		->select($fase->id, 'fase')
            ->attach('../uploads/templates/1.docx','ruta')
            ->type('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','titulo')
            ->check('obligatorio')
    		->press('Guardar')
    		->seePageIs('/psp/template/create')
            ->see('Nuevo Documento');
            //->see('El titulo no debe tener más de 100 caracteres');  
    }


    public function test_psp_cr_tem_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/create')
            ->select($fase->id, 'fase')
            ->attach('../uploads/templates/2.png','ruta')
            ->press('Guardar')
            ->seePageIs('/psp/template/create')
            ->see('Nuevo Documento');
            //->see('Debe ingresar un titulo');            
    }
/*
    public function test_psp_cr_tem_05()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/templates/create')
            ->select(1, 'fase')
            ->type('Plantilla','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/templates/create')
            ->see('Nuevo Documento');
            //->see('Debe ingresar una Plantilla');            
    }
*/
        public function test_psp_ed_tem_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $template   = factory(Intranet\Models\Template::class)->create();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/edit/'.$template->id)
            ->select($fase->id, 'fase')
            ->type('plantilla','titulo')
            ->attach('../uploads/templates/2.png','ruta')
            ->check('obligatorio')
            ->press('Guardar')
            ->seePageIs('/psp/template')
            ->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

        public function test_psp_ed_tem_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $template   = factory(Intranet\Models\Template::class)->create();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/edit/'.$template->id)
            ->select($fase->id, 'fase')
            ->type('plantilla','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/template')
            ->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

            public function test_psp_ed_tem_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $template   = factory(Intranet\Models\Template::class)->create();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/edit/'.$template->id)
            ->select($fase->id, 'fase')
            ->type('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/template/edit/'.$template->id)
            ->see('Editar Documento');
            //->see('El titulo no debe tener más de 100 caracteres');           
    }

            public function test_psp_ed_tem_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $template   = factory(Intranet\Models\Template::class)->create();
        $fase  = factory(Intranet\Models\Phase::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/template/edit/'.$template->id)
            ->select($fase->id, 'fase')
            ->type('','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/template/edit/'.$template->id)
            ->see('Editar Documento');
            //->see('Debe ingresar un titulo');            
    }

}
