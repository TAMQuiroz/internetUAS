<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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


        public function test_psp_ed_pdo_01()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $pspDocument   = factory(Intranet\Models\PspDocument::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/edit/'.$pspDocument->id)
            ->attach('images/1.png','ruta')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument');
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

            public function test_psp_ed_pdo_02()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $pspDocument   = factory(Intranet\Models\PspDocument::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/edit/'.$pspDocument->id)
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/edit/'.$pspDocument->id);
            //->see('Documentos');
             //$this->assertTrue(true);
            //->see('Debe ingresar un titulo');            
    }

        public function test_psp_ed_pdo_03()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $pspDocument   = factory(Intranet\Models\PspDocument::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/check/'.$pspDocument->id)
            ->type('Esta bien','observaciones')
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/search/'.$student->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }

            public function test_psp_ed_pdo_04()
    {
        $user = factory(Intranet\Models\User::class)->make();
        $pspDocument   = factory(Intranet\Models\PspDocument::class)->create();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => $user
            ])->visit('/psp/pspDocument/check/'.$pspDocument->id)
            ->press('Guardar')
            ->seePageIs('/psp/pspDocument/search/'.$student->id);
            //->see('Documentos');
            //->see('Debe ingresar un titulo');            
    }


}
