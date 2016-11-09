<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ScheduleMeetingsTest extends TestCase
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


      public function test_psp_ed_scm_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;       
        $fase  = factory(Intranet\Models\Phase::class)->create();   
        $schedule  = factory(Intranet\Models\Schedule_meetings::class)->create();
        $fase->idpspprocess = $schedule->idpspprocess;
        $fase->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/scheduleMeeting/edit/'.$schedule->id)
            ->select($fase->id, 'fase')
            ->type('2017-10-20','fecha_inicio')
            ->type('2017-11-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/scheduleMeeting');

    }


      public function test_psp_ed_scm_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;       
        $fase  = factory(Intranet\Models\Phase::class)->create();   
        $schedule  = factory(Intranet\Models\Schedule_meetings::class)->create();
        $fase->idpspprocess = $schedule->idpspprocess;
        $fase->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/scheduleMeeting/edit/'.$schedule->id)
            ->select($fase->id, 'fase')
            ->type('2017-10-20','fecha_inicio')
            //->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/scheduleMeeting/edit/'.$schedule->id);
    }

      public function test_psp_ed_scm_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;       
        $fase  = factory(Intranet\Models\Phase::class)->create();   
        $schedule  = factory(Intranet\Models\Schedule_meetings::class)->create();
        $fase->idpspprocess = $schedule->idpspprocess;
        $fase->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/scheduleMeeting/edit/'.$schedule->id)
            ->select($fase->id, 'fase')
            //->type('1992-08-20','fecha_inicio')
            ->type('2017-11-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/scheduleMeeting/edit/'.$schedule->id);
    }

      public function test_psp_ed_scm_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;       
        $fase  = factory(Intranet\Models\Phase::class)->create();   
        $schedule  = factory(Intranet\Models\Schedule_meetings::class)->create();
        $fase->idpspprocess = $schedule->idpspprocess;
        $fase->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/scheduleMeeting/edit/'.$schedule->id)
            ->select($fase->id, 'fase')
            ->type('1992-08-20','fecha_inicio')
            ->type('1992-09-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/scheduleMeeting/edit/'.$schedule->id);
    }


      public function test_psp_ed_scm_05()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $user->IdPerfil=3;       
        $fase  = factory(Intranet\Models\Phase::class)->create();   
        $schedule  = factory(Intranet\Models\Schedule_meetings::class)->create();
        $fase->idpspprocess = $schedule->idpspprocess;
        $fase->save();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/scheduleMeeting/edit/'.$schedule->id)
            //->select($fase->id, 'fase')
            ->type('2017-11-20','fecha_inicio')
            ->type('2017-10-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/scheduleMeeting/edit/'.$schedule->id);
    }
/*
          public function test_psp_ed_scm_06()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $fase  = factory(Intranet\Models\Phase::class)->create();
        $schedule  = factory(Intranet\Models\Schedule_meetings::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/scheduleMeeting/edit/'.$schedule->id)
            ->type('2017-10-20','fecha_inicio')
            ->type('2017-11-20','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/psp/scheduleMeeting/edit/'.$schedule->id);
    }
*/
}
