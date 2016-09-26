<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvestigatorTest extends TestCase
{
	//use WithoutMiddleware;
	use DatabaseMigrations;

    /*
    public function test_cr_inv_01()
    {
    	$this->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/investigacion/investigador/create')
    		->type('Cam','nombre')
    		->type('Chirinos','apellido_paterno')
    		->type('Bolson','apellido_materno')
    		->type('abc@gmail.com','correo')
    		->type('999999999','celular')
    		->select(1, 'especialidad')
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/')
    		->see('Lista de Investigadores')
    		->see('El investigador se ha registrado exitosamente');
    }
	*/

    public function test_cr_inv_02()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_cr_inv_03()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo nombre es obligatorio');
    }

    public function test_cr_inv_04()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('nombre solo debe contener letras');
    }

   	public function test_cr_inv_05()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('nombre solo debe contener letras');
    }

   	public function test_cr_inv_06()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido paterno no debe ser mayor que 50 caracteres');
    }

   	public function test_cr_inv_07()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo apellido paterno es obligatorio');
    }

    public function test_cr_inv_08()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido paterno solo debe contener letras');
    }

    public function test_cr_inv_09()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido paterno solo debe contener letras');
    }

    public function test_cr_inv_10()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido materno no debe ser mayor que 50 caracteres');
    }

    public function test_cr_inv_11()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo apellido materno es obligatorio');
    }

    public function test_cr_inv_12()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido materno solo debe contener letras');
    }

    public function test_cr_inv_13()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('apellido materno solo debe contener letras');
    }

	public function test_cr_inv_14()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('correo no es un correo válido');
    }

	public function test_cr_inv_15()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('El campo correo es obligatorio');
    }

	public function test_cr_inv_16()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('correo no es un correo válido');
    }
    
	public function test_cr_inv_17()
    {
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
    		->press('Guardar')
    		->seePageIs('/investigacion/investigador/create')
    		->see('Creación de Investigadores')
    		->see('correo no es un correo válido');
    }
}
