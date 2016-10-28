<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Teacher;
use Intranet\Models\User;

class ParameterTest extends TestCase
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
            ->visit('/tutoria/parametros/duracion')
            ->select('5','duration')
            ->press('Guardar')
            ->seePageIs('/tutoria/parametros/duracion')
            ->see('General')
            ->see('La duración de la cita se ha actualizado exitosamente');
    }
}
