<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;

class ProjectTest extends TestCase
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

    public function test_inv_pro_cr_01()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto')
    		->see('Lista de Proyectos')
    		->see('El proyecto se ha registrado exitosamente');
    }

    public function test_inv_pro_cr_02()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_pro_cr_03()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_pro_cr_04()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('$$$','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_pro_cr_05()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('5','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_pro_cr_06()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(-1,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El tamaño de num entregables debe ser de al menos 1');
    }

    public function test_inv_pro_cr_07()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type("",'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El campo num entregables es obligatorio');
    }

    public function test_inv_pro_cr_08()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(5,'num_entregables')
    		->type('02/05/2016','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('fecha ini debe ser una fecha posterior a today');
    }

    public function test_inv_pro_cr_09()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(5,'num_entregables')
    		->type('','fecha_ini')
    		->type('07/10/2017','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El campo fecha ini es obligatorio');
    }

    public function test_inv_pro_cr_10()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('','fecha_fin')
    		->type('Cam','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El campo fecha fin es obligatorio');
    }

    public function test_inv_pro_cr_11()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('06/10/2017','fecha_fin')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_inv_pro_cr_12()
    {
        $user 	= factory(Intranet\Models\User::class)->make();
        $area 	= factory(Intranet\Models\Area::class)->create();
        $grupo	= factory(Intranet\Models\Group::class)->create();
        
    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/proyecto/create')
    		->type('Cam','nombre')
    		->type(5,'num_entregables')
    		->type('06/10/2017','fecha_ini')
    		->type('06/10/2017','fecha_fin')
    		->type('','descripcion')
    		->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/proyecto/create')
    		->see('Crear proyecto')
    		->see('El campo descripcion es obligatorio');
    }
 

    public function test_inv_pro_ed_01()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/show/1')
            ->see('Proyecto')
            ->see('El proyecto se ha editado exitosamente');
    }

    public function test_inv_pro_ed_02()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_pro_ed_03()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El campo nombre es obligatorio');
    }

    public function test_inv_pro_ed_04()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('$$$','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_pro_ed_05()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('5','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_pro_ed_06()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(-1,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El tamaño de num entregables debe ser de al menos 1');
    }

    public function test_inv_pro_ed_07()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type("",'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El campo num entregables es obligatorio');
    }

    public function test_inv_pro_ed_08()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('02/05/2016','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('fecha ini debe ser una fecha posterior a today');
    }

    public function test_inv_pro_ed_09()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El campo fecha ini es obligatorio');
    }

    public function test_inv_pro_ed_10()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('','fecha_fin')
            ->type('Cam','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El campo fecha fin es obligatorio');
    }

    public function test_inv_pro_ed_11()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('06/10/2017','fecha_fin')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_inv_pro_ed_12()
    {
        $user = User::find(50);
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/1')
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('06/10/2017','fecha_fin')
            ->type('','descripcion')
            ->select(1, 'grupo')
            ->select(1, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/1')
            ->see('Editar proyecto')
            ->see('El campo descripcion es obligatorio');
    }

}
