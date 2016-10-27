<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscriptionTest extends TestCase
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
    public function test_psp_cr_sup_01()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Teacher::class)->make()
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor')
    		->see('Supervisores')
    		->see('El supervisor se ha registrado exitosamente');
    		
    }

    public function test_psp_cr_sup_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('2101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('codigo debe tener 8 dígitos');
    }

    public function test_psp_cr_sup_03()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo codigo es obligatorio');
    		
    }

    public function test_psp_cr_sup_04()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('######','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('codigo debe tener 8 dígitos');
    		
    }

    public function test_psp_cr_sup_05()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('nombres no debe ser mayor que 50 caracteres');
    }

    public function test_psp_cr_sup_06()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo nombres es obligatorio');
    }

    public function test_psp_cr_sup_07()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('$','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de nombres es inválido');
    }

    public function test_psp_cr_sup_08()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('8','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de nombres es inválido');
    }

	public function test_psp_cr_sup_09()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('apellido paterno no debe ser mayor que 50 caracteres');
    }    

    public function test_psp_cr_sup_10()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo apellido paterno es obligatorio');
    }  

    public function test_psp_cr_sup_11()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('$','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de apellido paterno es inválido');
    }  

    public function test_psp_cr_sup_12()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('8','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de apellido paterno es inválido');
    } 

    public function test_psp_cr_sup_13()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('apellido materno no debe ser mayor que 50 caracteres');
    }    

    public function test_psp_cr_sup_14()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo apellido materno es obligatorio');
    }  

    public function test_psp_cr_sup_15()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('$','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de apellido materno es inválido');
    }  

    public function test_psp_cr_sup_16()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('8','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de apellido materno es inválido');
    } 

    public function test_psp_cr_sup_17()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('correo no es un correo válido');
    } 

    public function test_psp_cr_sup_18()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo correo es obligatorio');
    } 

    public function test_psp_cr_sup_19()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('$','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('correo no es un correo válido');
    } 

    public function test_psp_cr_sup_20()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('8','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('correo no es un correo válido');
    } 

    public function test_psp_cr_sup_21()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('celular debe tener 9 dígitos');
    } 

    public function test_psp_cr_sup_22()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo celular es obligatorio');
    } 

    public function test_psp_cr_sup_23()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('###','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('celular debe tener 9 dígitos');
    } 

        public function test_psp_cr_sup_24()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('direccion no debe ser mayor que 50 caracteres');
    }    

    public function test_psp_cr_sup_25()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El campo direccion es obligatorio');
    }  

    public function test_psp_cr_sup_26()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('$','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de direccion es inválido');
    }  

    public function test_psp_cr_sup_27()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/create')
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('8','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/create')
    		->see('Creación de Supervisor')
    		->see('El formato de direccion es inválido');
    }


    //edit

        public function test_psp_ed_sup_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor')
    		->see('Supervisores')
    		->see('El supervisor se ha actualizado exitosamente');
    		
    }

        public function test_psp_ed_sup_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
    		->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('2101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('codigo debe tener 8 dígitos');
    }

    public function test_psp_ed_sup_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo codigo es obligatorio');
    		
    }

    public function test_psp_ed_sup_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('######','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('codigo debe tener 8 dígitos');
    		
    }

    public function test_psp_ed_sup_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('nombres no debe ser mayor que 50 caracteres');
    }

    public function test_psp_ed_sup_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo nombres es obligatorio');
    }

    public function test_psp_ed_sup_07()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('$','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de nombres es inválido');
    }

    public function test_psp_ed_sup_08()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('8','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de nombres es inválido');
    }

	public function test_psp_ed_sup_09()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('apellido paterno no debe ser mayor que 50 caracteres');
    }    

    public function test_psp_ed_sup_10()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo apellido paterno es obligatorio');
    }  

    public function test_psp_ed_sup_11()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('$','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de apellido paterno es inválido');
    }  

    public function test_psp_ed_sup_12()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('8','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de apellido paterno es inválido');
    } 

    public function test_psp_ed_sup_13()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('apellido materno no debe ser mayor que 50 caracteres');
    }    

    public function test_psp_ed_sup_14()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo apellido materno es obligatorio');
    }  

    public function test_psp_ed_sup_15()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('$','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de apellido materno es inválido');
    }  

    public function test_psp_ed_sup_16()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('8','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de apellido materno es inválido');
    } 

    public function test_psp_ed_sup_17()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('correo no es un correo válido');
    } 

    public function test_psp_ed_sup_18()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo correo es obligatorio');
    } 

    public function test_psp_ed_sup_19()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('$','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('correo no es un correo válido');
    } 

    public function test_psp_ed_sup_20()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('8','correo')
    		->type('999999999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('correo no es un correo válido');
    } 

    public function test_psp_ed_sup_21()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('celular debe tener 9 dígitos');
    } 

    public function test_psp_ed_sup_22()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo celular es obligatorio');
    } 

    public function test_psp_ed_sup_23()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('###','celular')
    		->type('Av Mundo 1234','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('celular debe tener 9 dígitos');
    } 

        public function test_psp_ed_sup_24()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('direccion no debe ser mayor que 50 caracteres');
    }    

    public function test_psp_ed_sup_25()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El campo direccion es obligatorio');
    }  

    public function test_psp_ed_sup_26()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('$','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de direccion es inválido');
    }  

    public function test_psp_ed_sup_27()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $supervisor   = factory(Intranet\Models\Supervisor::class)->create();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => $user
    		])->visit('/psp/supervisor/edit/'.$supervisor->id)
    		->type('20101010','codigo')
    		->type('Laura','nombres')
    		->type('Nazario','apellido_paterno')
    		->type('Ortiz','apellido_materno')
    		->type('abc@gmail1.com','correo')
    		->type('999999999','celular')
    		->type('8','direccion')
    		->press('Guardar')
    		->seePageIs('/psp/supervisor/edit/'.$supervisor->id)
    		->see('Editar Supervisor')
    		->see('El formato de direccion es inválido');
    }*/
}

