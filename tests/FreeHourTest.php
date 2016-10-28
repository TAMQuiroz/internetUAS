<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Supervisor;
use Intranet\Models\FreeHour;

class FreeHourTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    //Aun no funciona, espero tenerlo antes del pullrequest
    /*
    public function test_psp_cr_frh_01()
    {
        
        $supervisor = factory(Intranet\Models\Supervisor::class)->create();

        $user = User::find($supervisor->IdUser);

        $this->actingAs($user)
        ->withSession([
        	'actions' => [],
        	'user' => $user
        	])->visit('/psp/freeHour/create')
        ->type('9','hora_ini')
        ->press('Guardar')
        ->seePageIs('psp/freeHour/');        
    }
    */
}
