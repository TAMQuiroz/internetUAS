<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Supervisor;
use Intranet\Models\FreeHour;
use Intranet\Models\User;

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
        ->type('9','hora_ini')
        //Aviso: si se testea despues de esta fecha, cambiarla por favor
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/')
        ->see('La disponibilidad se ha registrado exitosamente');
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
        ->type('9','hora_ini')
        ->type('99/99/9999','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('fecha no es una fecha v&aacute;lida');
        
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
        ->type('9','hora_ini')
        ->type('01/01/1970','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('fecha debe ser una fecha posterior a');
        
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
        ->type('9','hora_ini')
        ->type('marcianito100realnofake','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('fecha no es una fecha v&aacute;lida');
        
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
        ->type('9','hora_ini')
        ->type('','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('El campo fecha es obligatorio');
        
    }

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
        ->type('100','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('hora ini no debe ser mayor a 21');
    }

    public function test_psp_cr_frh_07()
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
        ->type('1','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('El tama&ntilde;o de hora ini debe ser de al menos 8');
    }

    public function test_psp_cr_frh_08()
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
        ->type('','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('El campo hora ini es obligatorio');
    }

    public function test_psp_cr_frh_09()
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
        ->type('Kappa','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/create')
        ->see('hora ini debe ser num&eacute;rico');
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
        ->type('9','hora_ini')
        //Aviso: si se testea despues de esta fecha, cambiarla por favor
        ->type('11/01/2017','fecha')        
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
        ->type('9','hora_ini')
        ->type('99/99/9999','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('fecha no es una fecha v&aacute;lida');
        
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
        ->type('9','hora_ini')
        ->type('01/01/1970','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('fecha debe ser una fecha posterior a');
        
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
        ->type('9','hora_ini')
        ->type('marcianito100realnofake','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('fecha no es una fecha v&aacute;lida');
        
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
        ->type('9','hora_ini')
        ->type('','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('El campo fecha es obligatorio');
        
    }

    public function test_psp_ed_frh_06()
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
        ->type('100','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('hora ini no debe ser mayor a 21');
    }

    public function test_psp_ed_frh_07()
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
        ->type('1','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('El tama&ntilde;o de hora ini debe ser de al menos 8');
    }

    public function test_psp_ed_frh_08()
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
        ->type('','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('El campo hora ini es obligatorio');
    }

    public function test_psp_ed_frh_09()
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
        ->type('Kappa','hora_ini')
        ->type('11/01/2017','fecha')        
        ->press('Guardar')
        ->seePageIs('psp/freeHour/edit/'.$freeHour->id)
        ->see('hora ini debe ser num&eacute;rico');
    }

}
