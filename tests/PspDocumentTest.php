<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Student;
use Intranet\Models\Phase;
use Intranet\Models\Template;

class PspDocumentTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->assertTrue(true);
    }*/

    public function test_psp_cr_pdo_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();
        $phase =   factory(Intranet\Models\Phase::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/create/'.$psp->idalumno)
            ->select($phase->id,'fase')
            ->check('obligatorio')
            ->type('nuevo','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/search/'.$psp->idalumno);        
    }

        public function test_psp_cr_pdo_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();
        $phase =   factory(Intranet\Models\Phase::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/create/'.$psp->idalumno)
            ->select($phase->id,'fase')
            ->check('obligatorio')
            ->type('','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/create/'.$psp->idalumno);        
    }

        public function test_psp_cr_pdo_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();
        $phase =   factory(Intranet\Models\Phase::class)->create();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/create/'.$psp->idalumno)
            ->select($phase->id,'fase')
            ->check('obligatorio')
            ->type('-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------','titulo')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/create/'.$psp->idalumno);        
    }


        public function test_psp_ed_pdo_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=0;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/edit/'.$pspDocument->id)
            ->attach(asset('/uploads/templates/0.pdf'),'ruta')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument');

            //->see('Subir Documentos');
            //->see('Debe ingresar un titulo');            
    }
/*
            public function test_psp_ed_pdo_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=0;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/edit/'.$pspDocument->id)
            //->attach(,'ruta')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/edit/'.$pspDocument->id);
            //->see('Documentos');
             //$this->assertTrue(true);
            //->see('Debe ingresar un titulo');            
    }
*/


        public function test_psp_ed_pdo_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();

        //$pspDocument->idStudent=$student->IdAlumno;

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/check/'.$pspDocument->id)
            ->type('Esta bien','observaciones')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/search/'.$psp->idalumno);
            //->see('Detalle de Documento');
            //->see('Debe ingresar un titulo');            
    }


            public function test_psp_ed_pdo_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/check/'.$pspDocument->id)
            ->type('','observaciones')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/check/'.$pspDocument->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

            public function test_psp_ed_pdo_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $pspDocument = factory(Intranet\Models\PspDocument::class)->create();
        $pspDocument->es_fisico = 0;
        $temp=Template::find($pspDocument->idtemplate);
        $phase=Phase::find($temp->idphase);
        //$PspDocument->fecha_limite=$phase->fecha_fin;
        //$PspDocument->numerofase=$phase->numero;  
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $pspDocument->idstudent = $stud->IdAlumno;
        $pspDocument->save();
        $stud->IdUsuario = $user->IdUsuario;
        $stud->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/check/'.$pspDocument->id)
            ->type('-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------','observaciones')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/check/'.$pspDocument->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }



}
