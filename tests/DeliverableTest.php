<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\Project;

class DeliverableTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_inv_del_cr_01()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('Entregable de prueba','nombre')
            ->type('06/10/2017','fecha_ini')
            ->type('07/10/2017','fecha_fin')
            ->press('Guardar')
            ->seePageIs('/investigacion/proyecto/show/1')
            ->see('Proyecto')
            ->see('El proyecto se ha editado exitosamente');
    }
}
