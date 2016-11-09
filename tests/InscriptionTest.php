<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscriptionTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
   /* public function testExample()
    {
        $this->assertTrue(true);
    }*/

    public function test_psp_cr_ins_01()
    {
        $user = factory(Intranet\Models\User::class)->make();

    	$this->actingAs($user)
            ->withSession([
	    		'actions' => [],
	    		'user' => factory(Intranet\Models\Student::class)->make()
    		])->visit('/psp/inscription/create')
            ->type('ar','activ_formativas')
    		->type('trabajar','actividad_economica')
    		->type('bien','cond_seguridad_area')
    		->type('a','correo_jefe_directo')
    		->type('san juan','distrito_empresa')
    		->type('av juan','direccion_empresa')
    		->type('personas','equi_del_practicante')
    		->type('nuevo equip','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-10-2016','fecha_termino')
            ->type('jefe aux','jefe_directo_aux')
            ->type('nueva area','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            ->check('terminos')
    		->press('Guardar')
    		->seePageIs('/psp/inscription');
    		
    }

        public function test_psp_cr_ins_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
            ->type('ar','activ_formativas')
            ->type('trabajar','actividad_economica')
            ->type('bien','cond_seguridad_area')
            ->type('a','correo_jefe_directo')
            ->type('san juan','distrito_empresa')
            ->type('av juan','direccion_empresa')
            ->type('personas','equi_del_practicante')
            ->type('nuevo equip','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-10-2016','fecha_termino')
            ->type('jefe aux','jefe_directo_aux')
            ->type('nueva area','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create');
            
    }

         public function test_psp_cr_ins_03()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
            ->type('ar','activ_formativas')
            ->type('trabajar','actividad_economica')
            ->type('bien','cond_seguridad_area')
            ->type('a','correo_jefe_directo')
            ->type('san juan','distrito_empresa')
            ->type('av juan','direccion_empresa')
            ->type('personas','equi_del_practicante')
            ->type('nuevo equip','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-10-2016','fecha_termino')
            ->type('jefe aux','jefe_directo_aux')
            ->type('nueva area','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create');
            
    }

}

