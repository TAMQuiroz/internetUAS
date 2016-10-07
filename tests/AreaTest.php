<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaTest extends TestCase
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
/*
    public function test_inv_cr_are_01()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('Magia prohibida','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/')
    		->see('Lista de Areas')
    		->see('El area se ha registrado exitosamente');
    }

    public function test_inv_cr_are_02()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_cr_are_03()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_cr_are_04()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('$','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_cr_are_05()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('5','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_cr_are_06()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('Magia prohibida','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_inv_cr_are_07()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('Magia prohibida','nombre')
    		->type('','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('El campo descripcion es obligatorio');
    }

    public function test_inv_cr_are_08()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('Magia prohibida','nombre')
    		->type('$','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_cr_are_09()
    {
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/create')
    		->type('Magia prohibida','nombre')
    		->type('5','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/create')
    		->see('Creación de Areas')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_ed_are_01()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('Magia prohibida','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/')
    		->see('Lista de Areas')
    		->see('El area se ha actualizado exitosamente');
    }

    public function test_inv_ed_are_02()
    {
    	$user = factory(Intranet\Models\User::class)->make();
    	$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_ed_are_03()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_ed_are_04()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('$','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_ed_are_05()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('5','nombre')
    		->type('Artes oscuras de alto impacto','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_ed_are_06()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('Magia prohibida','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_inv_ed_are_07()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('Magia prohibida','nombre')
    		->type('','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('El campo descripcion es obligatorio');
    }

    public function test_inv_ed_are_08()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('Magia prohibida','nombre')
    		->type('$','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_ed_are_09()
    {
    	$user = factory(Intranet\Models\User::class)->make();
		$area   = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/investigacion/area/edit/'.$area->id)
    		->type('Magia prohibida','nombre')
    		->type('5','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/area/edit/'.$area->id)
    		->see('Edicion de Areas')
    		->see('El formato de descripcion es inválido');
    }
*/
}
