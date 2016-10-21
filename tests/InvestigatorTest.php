<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvestigatorTest extends TestCase
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

    public function test_inv_inv_cr_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $area = factory(Intranet\Models\Area::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/')
    		->see('Lista de Investigadores')
    		->see('El investigador se ha registrado exitosamente');
    }


    public function test_inv_inv_cr_02()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_inv_cr_03()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo nombre es obligatorio');
    }

    public function test_inv_inv_cr_04()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('$','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_inv_cr_05()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('5','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El formato de nombre es inválido');
    }

   	public function test_inv_inv_cr_06()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido paterno no debe ser mayor que 50 caracteres');
    }

   	public function test_inv_inv_cr_07()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo apellido paterno es obligatorio');
    }

    public function test_inv_inv_cr_08()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('$','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El formato de apellido paterno es inválido');
    }

    public function test_inv_inv_cr_09()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('5','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El formato de apellido paterno es inválido');
    }

    public function test_inv_inv_cr_10()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido materno no debe ser mayor que 50 caracteres');
    }

    public function test_inv_inv_cr_11()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo apellido materno es obligatorio');
    }

    public function test_inv_inv_cr_12()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('$','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El formato de apellido materno es inválido');
    }

    public function test_inv_inv_cr_13()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('5','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El formato de apellido materno es inválido');
    }

	public function test_inv_inv_cr_14()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('correo no es un correo válido');
    }

	public function test_inv_inv_cr_15()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo correo es obligatorio');
    }

	public function test_inv_inv_cr_16()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('$','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('correo no es un correo válido');
    }
    
	public function test_inv_inv_cr_17()
    {
        $area = factory(Intranet\Models\Area::class)->create();
    	$user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('5','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
            ->select($area->id, 'area')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('correo no es un correo válido');
    }

    public function test_inv_inv_cr_18()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/create')
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/create')
            ->see('Creación de Investigadores')
            ->see('celular debe tener 9 dígitos');
    }
    
    public function test_inv_inv_cr_19()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/create')
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/create')
            ->see('Creación de Investigadores')
            ->see('El campo celular es obligatorio');
    }
    
    public function test_inv_inv_cr_20()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/create')
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('#########','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/create')
            ->see('Creación de Investigadores')
            ->see('celular debe tener 9 dígitos');
    }

    public function test_inv_inv_ed_01()
    {
        $user           = factory(Intranet\Models\User::class)->make();
        $area           = factory(Intranet\Models\Area::class)->create();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/show/'.$investigator->id)
            ->see('Investigador')
            ->see('El investigador se ha actualizado exitosamente');
    }


    public function test_inv_inv_ed_02()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_inv_ed_03()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El campo nombre es obligatorio');
    }

    public function test_inv_inv_ed_04()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('$','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_inv_ed_05()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('5','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_inv_ed_06()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('apellido paterno no debe ser mayor que 50 caracteres');
    }

    public function test_inv_inv_ed_07()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El campo apellido paterno es obligatorio');
    }

    public function test_inv_inv_ed_08()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('$','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El formato de apellido paterno es inválido');
    }

    public function test_inv_inv_ed_09()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('5','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El formato de apellido paterno es inválido');
    }

    public function test_inv_inv_ed_10()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('apellido materno no debe ser mayor que 50 caracteres');
    }

    public function test_inv_inv_ed_11()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El campo apellido materno es obligatorio');
    }

    public function test_inv_inv_ed_12()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('$','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El formato de apellido materno es inválido');
    }

    public function test_inv_inv_ed_13()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('5','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El formato de apellido materno es inválido');
    }

    public function test_inv_inv_ed_14()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('correo no es un correo válido');
    }

    public function test_inv_inv_ed_15()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El campo correo es obligatorio');
    }

    public function test_inv_inv_ed_16()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('$','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('correo no es un correo válido');
    }
    
    public function test_inv_inv_ed_17()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('5','correo')
            ->type('999999999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('correo no es un correo válido');
    }

    public function test_inv_inv_ed_18()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('999','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('celular debe tener 9 dígitos');
    }
    
    public function test_inv_inv_ed_19()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('El campo celular es obligatorio');
    }
    
    public function test_inv_inv_ed_20()
    {
        $area = factory(Intranet\Models\Area::class)->create();
        $user = factory(Intranet\Models\User::class)->make();
        $investigator   = factory(Intranet\Models\Investigator::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Teacher::class)->make()
            ])->visit('/investigacion/investigador/edit/'.$investigator->id)
            ->type('Cam','nombre')
            ->type('Chirinos','apellido_paterno')
            ->type('Bolson','apellido_materno')
            ->type('abc@gmail.com','correo')
            ->type('#########','celular')
            ->select(1, 'especialidad')
            ->select($area->id, 'area')
            ->press('Guardar')
            ->seePageIs('/investigacion/investigador/edit/'.$investigator->id)
            ->see('Investigador')
            ->see('celular debe tener 9 dígitos');
    }

}
