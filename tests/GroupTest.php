<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
    /*
    public function test_inv_cr_gru_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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

    public function test_inv_cr_gru_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_cr_gru_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_cr_gru_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_cr_gru_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_cr_gru_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_cr_gru_07()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_cr_gru_08()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_cr_gru_09()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_cr_gru_10()
    {	
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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

    public function test_inv_cr_gru_11()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_cr_gru_12()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_cr_gru_13()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_cr_gru_14()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_cr_gru_15()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_cr_gru_16()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_cr_gru_17()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_cr_gru_18()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;

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
    		->see('Nuevo Grupo de Investigación')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_ed_gru_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/show/'.$grupo->id)
    		->see('Grupo de investigación')
    		->see('Las modificaciones se han guardado exitosamente');
    }

    public function test_inv_ed_gru_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
		$grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_ed_gru_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_ed_gru_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('$','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_ed_gru_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('5','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_ed_gru_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_ed_gru_07()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_ed_gru_08()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('$','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_ed_gru_09()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('5','descripcion')
    		->type(1,'lider')
    		->attach(asset('images/1.png'), 'imagen')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de descripcion es inválido');
    }

    public function test_inv_ed_gru_10()
    {	
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/show/'.$grupo->id)
    		->see('Grupo de investigación')
    		->see('Las modificaciones se han guardado exitosamente');
    }


    public function test_inv_ed_gru_11()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_ed_gru_12()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_ed_gru_13()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('$','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_ed_gru_14()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('5','nombre')
    		->type('Cam','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_ed_gru_15()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('descripcion no debe ser mayor que 200 caracteres');
    }

   	public function test_inv_ed_gru_16()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El campo descripcion es obligatorio');
    }

   	public function test_inv_ed_gru_17()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('$','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de descripcion es inválido');
    }

   	public function test_inv_ed_gru_18()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdEspecialidad = 1;
        $grupo = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user,
	    		'faculty-code' => 1
    		])->visit('/investigacion/grupo/edit/'.$grupo->id)
    		->type('Cam','nombre')
    		->type('5','descripcion')
    		->type(1,'lider')
    		->press('Guardar')
    		->seePageIs('/investigacion/grupo/edit/'.$grupo->id)
    		->see('Edicion de grupos de investigación')
    		->see('El formato de descripcion es inválido');
    }
	*/
}
