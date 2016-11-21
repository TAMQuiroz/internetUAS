<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Supervisor;
use Intranet\Models\FreeHour;
use Intranet\Models\User;
use Carbon\Carbon;

class FreeHourTest extends TestCase
{
    use DatabaseMigrations;    
    
    //Create

    public function test_psp_cr_frh_01()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
        	'IdPerfil' => 6,
        	]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
        	'idUser' => $user->IdUsuario,
        	]);


        $this->actingAs($user)
        ->withSession([
        	'actions' => [],
        	'user' => $user
        	])->visit('/psp/freeHour/create')        
        ->check('hora_ini')
        //Aviso: si se testea despues de esta fecha, cambiarla por favor
        ->type('11-01-2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/');        
    }

    public function test_psp_cr_frh_02()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);


        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/create')        
        ->check('hora_ini')
        ->type('99-99-9999','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create');
    }

    public function test_psp_cr_frh_03()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);


        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/create')        
        ->check('hora_ini')
        ->type('01-01-1970','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create');
    }

    public function test_psp_cr_frh_04()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);


        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/create')        
        ->check('hora_ini')
        ->type('marcianito100realnofake','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create');
    }

    public function test_psp_cr_frh_05()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);


        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/create')        
        ->check('hora_ini')
        ->type('','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create');
    }

    //Hora INI Nuevo v2
    public function test_psp_cr_frh_06()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);


        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/create')
        ->type('11-01-2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create');        
    }

    //Edit

    public function test_psp_ed_frh_01()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);

        $freeHour = factory(Intranet\Models\FreeHour::class)->create([
            'idSupervisor' => $supervisor->id,
            ]);

        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/edit/'.$freeHour->id)        
        ->check('hora_ini')
        //Aviso: si se testea despues de esta fecha, cambiarla por favor
        ->type('11-01-2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/show/'.$freeHour->id)
        ->see('La disponibilidad se ha actualizado exitosamente');
    }

    public function test_psp_ed_frh_02()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);

        $freeHour = factory(Intranet\Models\FreeHour::class)->create([
            'idSupervisor' => $supervisor->id,
            ]);

        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/edit/'.$freeHour->id)      
        ->check('hora_ini')
        ->type('','fecha')
        ->type('99-99-9999','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id);
        
    }

    public function test_psp_ed_frh_03()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $freeHour = factory(Intranet\Models\FreeHour::class)->create([
            'idSupervisor' => $supervisor->id,
            ]);

        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/edit/'.$freeHour->id)        
        ->check('hora_ini')
        ->type('01-01-1970','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id);
        
    }

    public function test_psp_ed_frh_04()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $freeHour = factory(Intranet\Models\FreeHour::class)->create([
            'idSupervisor' => $supervisor->id,
            ]);

        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/edit/'.$freeHour->id)        
        ->check('hora_ini')
        ->type('marcianito100realnofake','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id);
        
    }

    public function test_psp_ed_frh_05()
    {
        
        $user = factory(Intranet\Models\User::class)->create([
            'IdPerfil' => 6,
            ]);

        $supervisor = factory(Intranet\Models\Supervisor::class)->create([
            'idUser' => $user->IdUsuario,
            ]);
        $freeHour = factory(Intranet\Models\FreeHour::class)->create([
            'idSupervisor' => $supervisor->id,
            ]);

        $this->actingAs($user)
        ->withSession([
            'actions' => [],
            'user' => $user
            ])->visit('/psp/freeHour/edit/'.$freeHour->id)        
        ->check('hora_ini')
        ->type('','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id);
        
    }

    //No hay hora vacia invalida (ya esta con check)
    


}
