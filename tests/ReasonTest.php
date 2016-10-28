<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\User;

class ReasonTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tut_reason_cr_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $teacher = factory(Intranet\Models\Teacher::class)->create();
        $this->actingAs($user)
    	    ->withSession([
    		    'actions' => [],
    		    'user' => $user,
              	'faculty-code' => $teacher->IdEspecialidad
    			])
            ->visit('/tutoria/parametros/motivos/create')
            ->select('1','tipo')
            ->type('Viaje', 'nombre')
            ->press('Guardar')
            ->seePageIs('/tutoria/parametros/motivos/')
            ->see('Motivos')
            ->see('El motivo se ha registrado exitosamente');
    }

    public function test_tut_reason_cr_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $teacher = factory(Intranet\Models\Teacher::class)->create();
        $this->actingAs($user)
    	    ->withSession([
    		    'actions' => [],
    		    'user' => $user,
              	'faculty-code' => $teacher->IdEspecialidad
    			])
            ->visit('/tutoria/parametros/motivos/create')
            ->select('2','tipo')
            ->type('Doctorado', 'nombre')
            ->press('Guardar')
            ->seePageIs('/tutoria/parametros/motivos/')
            ->see('Motivos')
            ->see('El motivo se ha registrado exitosamente');
    }
}
