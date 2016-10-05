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
    public function testExample()
    {
        $this->assertTrue(true);
    }

   /* public function test_cr_are_01()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/templates/create')
    		->select(1, 'fase')
    		->type('Plantilla1','titulo')
    		->attach('../uploads/templates/1.docx','ruta')
    		->check('obligatorio')
    		->press('Guardar')
    		->seePageIs('/psp/templates/')
    		->see('Documentos')
    		->see('La plantilla se ha registrado exitosamente');
    }

    public function test_cr_are_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/templates/create')
    		->select(2, 'fase')
    		->type('Plantilla2','titulo')
    		->attach('../uploads/templates/2.docx','ruta')
    		->press('Guardar')
    		->seePageIs('/psp/templates/')
    		->see('Documentos')
    		->see('La plantilla se ha registrado exitosamente');
    }*/

    public function test_cr_are_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        //$user = factory(Intranet\Models\Template::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/templates/create')
    		//->select(1, 'fase')
    		->press('Guardar')
    		->seePageIs('/psp/templates/create');
    		//->see('Nuevo Documento')
    		//->see('Debe ingresar una Plantilla');
    }


}
