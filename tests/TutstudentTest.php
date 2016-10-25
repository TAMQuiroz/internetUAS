<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\Tutstudent;
use Intranet\Models\User;

class TutstudentTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tutoria_crear_alumno_ok()
    {
        $user = factory(Intranet\Models\User::class)->make();
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/')
       ->see('Alumnos de');  
    }

    public function test_tutoria_crear_alumno_nombre_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('PierPierooPierPierooPierPierooPierPierooPierPierooa','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_nombre_vacio()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       // ->type('','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

	public function test_tutoria_crear_alumno_nombre_carac_especial()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier$do','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_nombre_numero()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('333','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_app_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('PierPierooPierPierooPierPierooPierPierooPierPierooa','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_app_vacio()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       // ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

	public function test_tutoria_crear_alumno_app_carac_especial()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Ro*jas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_app_numero()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Roj4444as','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_apm_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('PierPierooPierPierooPierPierooPierPierooPierPierooa','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_apm_vacio()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       // ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

	public function test_tutoria_crear_alumno_apm_carac_especial()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Na^pan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_apm_numero()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Nap554an','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_correo_invalido()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pierrojaspe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_correo_vacio()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       // ->type('pierrojaspe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_correo_carac_especial()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas%$','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_correo_numero()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type(''.rand(pow(10, 7), pow(10, 8)-1),'codigo')       
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('3333','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_codigo_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type('201025509','codigo')
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_codigo_vacio()
    {
        $teacher = Teacher::get()->first();;//cojo un coordinador de especialidad
        $user = User::find($teacher->IdUsuario);//tengo las credenciales de ese coordinador
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => factory(Intranet\Models\Teacher::class)->make(),
            'faculty-code' => $teacher->IdEspecialidad
        ])->visit('/tutoria/alumnos/create')
       // ->type('20102550','codigo')
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    public function test_tutoria_crear_alumno_codigo_invalido()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type('20qq^509','codigo')
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('Nuevo alumno');  
    }

    



    public function test_tutoria_crear_alumno_codigo_repetido()
    {
        $user = factory(Intranet\Models\User::class)->make();
          
        $this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/tutoria/alumnos/create')
       ->type('20102550','codigo')
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar');
       

      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/tutoria/alumnos/create')
       ->type('20102550','codigo')
       ->type('Pier','nombre')
       ->type('Rojas','app')
       ->type('Napan','apm')
       ->type('pier.rojas@pucp.pe','correo')
       ->press('Guardar')
       ->seePageIs('tutoria/alumnos/create')
       ->see('El código de alumno que se intenta registrar ya existe.');  
    }
}
