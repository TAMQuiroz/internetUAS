<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Evaluation;
use Intranet\Models\Tutstudent;
use Intranet\Models\User;
class EvaluationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tutoria_crear_evaluacion_ok()
    {
        $user = factory(Intranet\Models\User::class)->make();
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/11/2016','fecha_inicio')
       ->type('30/11/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_nombre_vacio()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('','nombre')
       ->type('29/11/2016','fecha_inicio')
       ->type('30/11/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_nombre_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de pruebaEvaluacion de prueba1','nombre')
       ->type('29/11/2016','fecha_inicio')
       ->type('30/11/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_fechas_inicio_vacia()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')       
       ->type('27/11/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_fechas_fin_vacia()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')       
       ->type('27/12/2016','fecha_inicio')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_fechas_incorrectas1()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/11/2016','fecha_inicio')
       ->type('27/11/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_fechas_incorrectas2()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/09/2016','fecha_inicio')
       ->type('30/11/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_descripcion_vacia()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')       
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_descripcion_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/11/2016','fecha_inicio')
       ->type('30/11/2016','fecha_fin')
       ->type('Este es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionEste es  ejemplo de evaluacionevaluacion1','descripcion')
       ->type('60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_tiempo_vacio()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')       
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_tiempo_negativo()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('-60','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_tiempo_cero()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('0','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_tiempo_grande()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('1000','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_tiempo_decimal()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('4.5','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }

    public function test_tutoria_crear_evaluacion_tiempo_alfanumerico()
    {
        $user = factory(Intranet\Models\User::class)->make();
                          
      $this->actingAs($user)//entro al sistema con ese usuario
      ->withSession([
        'actions' => [],
        'user' => $user
        ])->visit('/evaluaciones/evaluaciones/create')       
       ->type('Evaluacion de prueba','nombre')
       ->type('29/12/2016','fecha_inicio')
       ->type('30/12/2016','fecha_fin')
       ->type('Este es un ejemplo de evaluacion','descripcion')
       ->type('ab5','tiempo')
       ->click('Abrir banco de preguntas')
       ->click('Buscar')       
       // ->click('Agregar a evaluación')
       ->press('Guardar')
       ->seePageIs('/evaluaciones/evaluaciones/create')
       ->see('Nueva evaluación');  
    }
}
