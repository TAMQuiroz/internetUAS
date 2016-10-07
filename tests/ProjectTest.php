<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

    public function test_inv_cr_pro_01()
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

    public function test_inv_cr_pro_02()
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
    		->see('Creación de Proyecto')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_cr_pro_03()
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
    		->see('Creación de Proyecto')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_cr_pro_04()
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
    		->see('Creación de Proyecto')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_cr_pro_05()
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
    		->see('Creación de Proyecto')
    		->see('El formato de nombre es inválido');
    }

    public function test_inv_cr_pro_06()
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
    		->see('Creación de Proyecto')
    		->see('El tamaño de num entregables debe ser de al menos 1');
    }

    public function test_inv_cr_pro_07()
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
    		->see('Creación de Proyecto')
    		->see('El campo num entregables es obligatorio');
    }

    public function test_inv_cr_pro_08()
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
    		->see('Creación de Proyecto')
    		->see('fecha ini debe ser una fecha posterior a today');
    }

    public function test_inv_cr_pro_09()
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
    		->see('Creación de Proyecto')
    		->see('El campo fecha ini es obligatorio');
    }

    public function test_inv_cr_pro_10()
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
    		->see('Creación de Proyecto')
    		->see('El campo fecha fin es obligatorio');
    }

    public function test_inv_cr_pro_11()
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
    		->see('Creación de Proyecto')
    		->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_inv_cr_pro_12()
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
    		->see('Creación de Proyecto')
    		->see('El campo descripcion es obligatorio');
    }
 

    public function test_inv_ed_pro_01()
    {
        $user       = factory(Intranet\Models\User::class)->make();
        $area       = factory(Intranet\Models\Area::class)->create();
        $grupo      = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/show/'.$proyecto->id)
            ->see('Proyecto')
            ->see('El proyecto se ha editado exitosamente');
    }

    public function test_inv_ed_pro_02()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_ed_pro_03()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El campo nombre es obligatorio');
    }

    public function test_inv_ed_pro_04()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('$$$','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_ed_pro_05()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('5','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_ed_pro_06()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(-1,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El tamaño de num entregables debe ser de al menos 1');
    }

    public function test_inv_ed_pro_07()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type("",'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El campo num entregables es obligatorio');
    }

    public function test_inv_ed_pro_08()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('02/05/2016','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('fecha ini debe ser una fecha posterior a today');
    }

    public function test_inv_ed_pro_09()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El campo fecha ini es obligatorio');
    }

    public function test_inv_ed_pro_10()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('','fecha_fin')
            ->type('Cam','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El campo fecha fin es obligatorio');
    }

    public function test_inv_ed_pro_11()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('06/10/2017','fecha_fin')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('descripcion no debe ser mayor que 100 caracteres');
    }

    public function test_inv_ed_pro_12()
    {
        $user   = factory(Intranet\Models\User::class)->make();
        $area   = factory(Intranet\Models\Area::class)->create();
        $grupo  = factory(Intranet\Models\Group::class)->create();
        $proyecto   = factory(Intranet\Models\Project::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/proyecto/edit/'.$proyecto->id)
            ->type('Cam','nombre')
            ->type(5,'num_entregables')
            ->type('06/10/2017','fecha_ini')
            ->type('06/10/2017','fecha_fin')
            ->type('','descripcion')
            ->select($grupo->id, 'grupo')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/edit/'.$proyecto->id)
            ->see('Editar proyecto')
            ->see('El campo descripcion es obligatorio');
    }

}
