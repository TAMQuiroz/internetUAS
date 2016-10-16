<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
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

    public function test_inv_evnt_cr_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
    		->type('Auditorio CIA','ubicacion')
    		->type('07/10/2017','fecha')
    		->type('08:00 a.m.','hora')
    		->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/')
    		->see('Lista de Eventos')
    		->see('El evento se ha registrado exitosamente');
    }


    public function test_inv_evnt_cr_02()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_evnt_cr_03()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('','nombre')
    		->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_evnt_cr_04()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('$','nombre')
    		->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_evnt_cr_05()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('5','nombre')
    		->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_evnt_cr_06()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','ubicacion')
    		->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('ubicacion no debe ser mayor que 50 caracteres');
    }

   	public function test_inv_evnt_cr_07()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
    		->type('','ubicacion')
    		->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El campo ubicacion es obligatorio');
    }

    public function test_inv_evnt_cr_08()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
    		->type('$','ubicacion')
    		->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El formato de ubicacion es inválido');
    }

    public function test_inv_evnt_cr_09()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
    		->type('5','ubicacion')
    		->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El formato de ubicacion es inválido');
    }

    public function test_inv_evnt_cr_10()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
    		->type('Auditorio CIA','ubicacion')
    		->type('02/05/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('fecha debe ser una fecha posterior a Hoy');
    }

    public function test_inv_evnt_cr_11()
    {
    	$user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/evento/create')
    		->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
    		->type('','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
    		->press('Guardar')
    		->seePageIs('/investigacion/evento/create')
    		->see('Creación de Eventos')
    		->see('El campo fecha es obligatorio');
    }

    public function test_inv_evnt_cr_12()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/create')
            ->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde
                    ','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/create')
            ->see('Creación de Eventos')
            ->see('descripcion no debe ser mayor que 200 caracteres');
    }

    public function test_inv_evnt_cr_13()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/create')
            ->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/create')
            ->see('Creación de Eventos')
            ->see('El campo descripcion es obligatorio');
    }

    public function test_inv_evnt_ed_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba actualizado','nombre')
            ->type('Auditorio Pabellon A','ubicacion')
            ->type('08/10/2017','fecha')
            ->type('10:00 a.m.','hora')
            ->type('2','duracion')
            ->select('1','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio pabellon A','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/show/'.$evento->id)
            ->see('Evento')
            ->see('El evento se ha actualizado exitosamente');
    }

    public function test_inv_evnt_ed_02()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_evnt_ed_03()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El campo nombre es obligatorio');
    }

    public function test_inv_evnt_ed_04()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('$','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_evnt_ed_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('5','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_evnt_ed_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('ubicacion no debe ser mayor que 50 caracteres');
    }

    public function test_inv_evnt_ed_07()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El campo ubicacion es obligatorio');
    }

    public function test_inv_evnt_ed_08()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('$','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El formato de ubicacion es inválido');
    }

    public function test_inv_evnt_ed_09()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('5','ubicacion')
            ->type('07/10/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El formato de ubicacion es inválido');
    }

    public function test_inv_evnt_ed_10()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('02/05/2017','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('fecha debe ser una fecha posterior a Hoy');
    }

    public function test_inv_evnt_ed_11()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('Evento de prueba en auditorio CIA','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El campo fecha es obligatorio');
    }

    public function test_inv_evnt_ed_12()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde
                    ','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('descripcion no debe ser mayor que 200 caracteres');
    }

    public function test_inv_evnt_ed_13()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $evento   = factory(Intranet\Models\Event::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/evento/edit/'.$evento->id)
            ->type('Evento de prueba','nombre')
            ->type('Auditorio CIA','ubicacion')
            ->type('','fecha')
            ->type('08:00 a.m.','hora')
            ->type('1','duracion')
            ->select('0','tipo')
            ->select($grupo->id,'grupo')
            ->type('','descripcion')
            ->press('Guardar')
            ->seePageIs('/investigacion/evento/edit/'.$evento->id)
            ->see('Evento')
            ->see('El campo descripcion es obligatorio');
    }
}
