<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Student;
use Intranet\Models\Inscription;
use Intranet\Models\Studentxinscriptionfiles;
use Intranet\Models\PspStudent;

class InscriptionRecommendationTest extends TestCase
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

       	public function test_psp_ed_ins_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $inscription= factory(Intranet\Models\Inscription::class)->create();
        
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $stud->IdUsuario = $user->IdUsuario;
        
        $stud->save();
        $studentxinscription  = new Studentxinscriptionfiles;
        $studentxinscription->idinscriptionfile =$inscription->id;
        $studentxinscription->idpspstudents=$psp->id;
        $studentxinscription->acepta_terminos=1;
        $studentxinscription->save();
        
        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/inscription/check/'.$inscription->id)
            ->type('Esta bien','recomendaciones')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/search/'.$psp->idalumno);
        
            //->see('Detalle de Documento');
            //->see('Debe ingresar un titulo');            
    }

       	public function test_psp_ed_ins_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $inscription= factory(Intranet\Models\Inscription::class)->create();
        
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $stud->IdUsuario = $user->IdUsuario;
        
        $stud->save();
        $studentxinscription  = new Studentxinscriptionfiles;
        $studentxinscription->idinscriptionfile =$inscription->id;
        $studentxinscription->idpspstudents=$psp->id;
        $studentxinscription->acepta_terminos=1;
        $studentxinscription->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/inscription/check/'.$inscription->id)
            ->type(NULL,'recomendaciones')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/check/'.$inscription->id);
            //->see('Detalle de Documento');
            //->see('Debe ingresar un titulo');            
    }

        	public function test_psp_ed_ins_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=6;
        $user->save();
        $inscription= factory(Intranet\Models\Inscription::class)->create();
        
        $psp = factory(Intranet\Models\PspStudent::class)->create();
        $proc = factory(Intranet\Models\PspProcess::class)->create();
        $tut = factory(Intranet\Models\Tutstudent::class)->create();
        $tut->id_usuario = $user->IdUsuario;
        $tut->save();
        $stud = Student::find($psp->idalumno);
        $stud->IdUsuario = $user->IdUsuario;
        
        $stud->save();
        $studentxinscription  = new Studentxinscriptionfiles;
        $studentxinscription->idinscriptionfile =$inscription->id;
        $studentxinscription->idpspstudents=$psp->id;
        $studentxinscription->acepta_terminos=1;
        $studentxinscription->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/inscription/check/'.$inscription->id)
            ->type('----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------','recomendaciones')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/check/'.$inscription->id);
            //->see('Detalle de Documento');
            //->see('Debe ingresar un titulo');            
    }

}
