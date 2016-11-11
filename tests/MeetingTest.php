<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Models\PspStudent;

class MeetingTest extends TestCase
{
    use DatabaseMigrations; 
    
    public function test_psp_cr_met_01(){
    	$user = factory(Intranet\Models\User::class)->create([
        	'IdPerfil' => 6,
        	]);
    	$student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
        	'idUser' => $user->IdUsuario,
        	]);
        $this->actingAs($user)
        ->withSession([
        	'actions' => [],
        	'user' => $user
        	])->visit('/psp/meeting/createSup')
    	->select(2,'tiporeunion') 
    	->type('11/01/2017','fecha')
    	->type('9','hora_inicio')
    	->select($student->IdAlumno,'alumno')
    	->type('av 123','lugar')
    	->press('Guardar')
        ->seePageIs('psp/meeting/indexSup');
    }

    public function test_psp_cr_met_02(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('psp/meeting/createSup')
        ->select('','tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('9','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_03(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('40/30/0001','fecha')
        ->type('9','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_04(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('01/01/1970','fecha')
        ->type('9','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_05(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('asgfjkl','fecha')
        ->type('9','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_06(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('','fecha')
        ->type('9','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_07(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('100','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_08(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('0','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_09(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_10(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('kappa','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_11(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('10','hora_inicio')
        ->select('','alumno')
        ->type('av 123','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_12(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('10','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_13(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('10','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }

    public function test_psp_cr_met_14(){
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/createSup')
        ->select(2,'tiporeunion') 
        ->type('11/01/2017','fecha')
        ->type('10','hora_inicio')
        ->select($student->IdAlumno,'alumno')
        ->type('!"·$%&/()=?¿','lugar')
        ->press('Guardar')
        ->seePageIs('psp/meeting/createSup');
    }
    /*
    public function test_psp_ed_met_01(){       
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);
        $student = Student::get()->first();
        //dd($student);
        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);

        $student = Student::get()->first();

        $meeting = factory(Intranet\Models\meeting::class)->create([
            'idsupervisor' => $supervisor->id,            
            ]);
        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/meeting/edit/'.$meeting->id)        
        ->type('av peru','lugar')
        ->type('observaciones','observaciones')
        ->type('retroalimentacion','retroalimentacion')
        ->select('12','idtipoestado')
        ->press('Guardar')
        ->seePageIs('psp/meeting/indexSup');
    }*/

}
