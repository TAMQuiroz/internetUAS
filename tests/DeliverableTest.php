<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Intranet\Models\User;
use Intranet\Models\Deliverable;

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
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Lista de entregables')
            ->seePageIs('/investigacion/entregable/1')
            ->see('El entregable se ha registrado exitosamente');
    }

    public function test_inv_del_cr_02()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_del_cr_03()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('El campo nombre es obligatorio');
    }

    public function test_inv_del_cr_04()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('$','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_del_cr_05()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('5','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_del_cr_06()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('Cam','nombre')
            ->type('2017-10-10','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('fecha ini debe ser una fecha anterior a fecha fin');
    }

    public function test_inv_del_cr_07()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('Cam','nombre')
            ->type('','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('El campo fecha ini es obligatorio');
    }

    public function test_inv_del_cr_08()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('Cam','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-07','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('fecha fin debe ser una fecha posterior a fecha ini');
    }

    public function test_inv_del_cr_09()
    {
        $user = User::find(50);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/create/1')
            ->type('Cam','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('','fecha_fin')
            ->press('Guardar')
            ->see('Crear entregable')
            ->seePageIs('/investigacion/entregable/create/1')
            ->see('El campo fecha fin es obligatorio');
    }

    public function test_inv_del_ed_01()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Entregable de prueba','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Entregable')
            ->seePageIs('/investigacion/entregable/show/'.$entregable->id)
            ->see('El entregable se ha modificado exitosamente');
    }

    public function test_inv_del_ed_02()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('nombre no debe ser mayor que 50 caracteres');
    }

    public function test_inv_del_ed_03()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El campo nombre es obligatorio');
    }

    public function test_inv_del_ed_04()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('$','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El formato de nombre es inválido');
    }

    public function test_inv_del_ed_05()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('5','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El formato de nombre es inválido');
    }
    
    public function test_inv_del_ed_06()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('2017-10-10','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('fecha ini debe ser una fecha anterior a fecha fin');
    }

    public function test_inv_del_ed_07()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El campo fecha ini es obligatorio');
    }

    public function test_inv_del_ed_08()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('2017-10-09','fecha_ini')
            ->type('2017-10-07','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('fecha fin debe ser una fecha posterior a fecha ini');
    }

    public function test_inv_del_ed_09()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('2017-10-09','fecha_ini')
            ->type('','fecha_fin')
            ->type(0,'porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El campo fecha fin es obligatorio');
    }

    public function test_inv_del_ed_10()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type('-5','porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El tamaño de porcen avance debe ser de al menos 0');
    }

    public function test_inv_del_ed_11()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type('105','porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('porcen avance no debe ser mayor a 100');
    }

    public function test_inv_del_ed_12()
    {
        $user = User::find(50);
        $entregable = Deliverable::find(1);

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/investigacion/entregable/edit/'.$entregable->id)
            ->type('Cam','nombre')
            ->type('2017-10-08','fecha_ini')
            ->type('2017-10-09','fecha_fin')
            ->type('','porcen_avance')
            ->press('Guardar')
            ->see('Editar entregable')
            ->seePageIs('/investigacion/entregable/edit/'.$entregable->id)
            ->see('El campo porcen avance es obligatorio');
    }
}