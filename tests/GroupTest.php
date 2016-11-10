<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;

class GroupTest extends TestCase
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

    public function test_inv_gru_cr_01()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/')
    		->see('Lista de Grupos de Investigación')
    		->see('El grupo se ha registrado exitosamente');
    }

    public function test_inv_gru_cr_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_gru_cr_03()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_gru_cr_04()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('$','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_gru_cr_05()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('5','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_gru_cr_06()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_gru_cr_07()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_gru_cr_08()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('$','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_gru_cr_09()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('5','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_gru_cr_10()
    {	
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/')
    		->see('Lista de Grupos de Investigación')
    		->see('El grupo se ha registrado exitosamente');
    }

    public function test_inv_gru_cr_11()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_gru_cr_12()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_gru_cr_13()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('$','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_gru_cr_14()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('5','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_gru_cr_15()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_gru_cr_16()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_gru_cr_17()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('$','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_gru_cr_18()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/create')
    		->type('Cam','nombre')
    		->type('5','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/create')
    		->see('Crear Grupo')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_gru_ed_01()
    {

        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/show/1')
    		->see('Grupo de investigación')
    		->see('Las modificaciones se han guardado exitosamente');

    }

    public function test_inv_gru_ed_02()
    {

        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_gru_ed_03()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_gru_ed_04()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('$','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_gru_ed_05()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('5','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_gru_ed_06()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_gru_ed_07()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_gru_ed_08()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('$','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_gru_ed_09()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('5','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_gru_ed_10()
    {	
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/show/1')
    		->see('Grupo de investigación')
    		->see('Las modificaciones se han guardado exitosamente');
    }


    public function test_inv_gru_ed_11()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_gru_ed_12()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_gru_ed_13()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('$','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_gru_ed_14()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('5','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_gru_ed_15()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_gru_ed_16()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_gru_ed_17()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('$','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_gru_ed_18()
    {
        $user = User::find(50);

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/1')
    		->type('Cam','nombre')
    		->type('5','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/1')
    		->see('Edicion de grupos')
    		->see('El formato de descripcion es inválido');
    }

}
