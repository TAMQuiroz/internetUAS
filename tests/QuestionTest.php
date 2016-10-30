<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Question;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\User;

class QuestionTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tutoria_crear_pregunta_ok()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();        

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')       
       ->type('Que se requiere para pasar DP2','descripcion')       
       // ->select('1', 'competencia')
       ->type('60','tiempo')
       ->type('60','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')
       ->click('Cancelar')
       ->seePageIs('/evaluaciones/preguntas')
       ->see('Banco de preguntas');  
    }

    public function test_tutoria_crear_pregunta_descripcion_vacia()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('60','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_competencia_vacia()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_tiempo_vacio()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       // ->type('60','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_tiempo_negativo()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('-60','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_tiempo_alfanumerico()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('ab0','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_tiempo_grande()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('1000','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_puntaje_vacio()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       // ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_puntaje_negativo()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('-1','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_puntaje_grande()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('1000','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_puntaje_alfanumerico()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('ab2','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_puntaje_cero()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('0','puntaje')
       ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_dificultad_vacia()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('1','puntaje')
       // ->select('1', 'dificultad')
       ->type('req','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }

    public function test_tutoria_crear_pregunta_req_grande()
    {
    	$teacher = Teacher::where('IdDocente',4)->get()->first();
    	$user = User::find($teacher->IdUsuario);        
        factory(Intranet\Models\Competence::class)->create();       

        DB::table('teacherxcompetences')->insert(['id_docente' => 4, 'id_especialidad' => 1, 'id_competence' => 1]);
                    	  	
    	$this->actingAs($user)//entro al sistema con ese usuario
    	->withSession([
    		'actions' => [],
    		'user' => $user
    		])->visit('/evaluaciones/preguntas/create')              
       ->type('Que se requiere para pasar DP2','descripcion')
       ->type('60','tiempo')
       ->type('1','puntaje')
       ->select('1', 'dificultad')
       ->type('requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 requitos1 2','requisitos')
       ->select('2', 'tipo')       
       ->seePageIs('/evaluaciones/preguntas/create')
       ->see('Nueva pregunta');  
    }
}
