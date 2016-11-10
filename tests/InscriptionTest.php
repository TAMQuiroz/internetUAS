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
    		->type('jefe@mail.com','correo_jefe_directo')
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
    		->seePageIs('/psp/inscription')
            ->see('Inscripción de Empresa')
            ->see('La inscripción se ha registrado exitosamente');
    		
    }

        public function test_psp_cr_ins_02()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('','activ_formativas')
            ->type('trabajar','actividad_economica')
            ->type('bien','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo actividades formativas es obligatorio');
            
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
            ->type('','actividad_economica')
            ->type('bien','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo actividad economica es obligatorio');
            
    }

      public function test_psp_cr_ins_04()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo condiciones de seguridad de área es obligatorio');
            
    }

      public function test_psp_cr_ins_05()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo correo de jefe directo es obligatorio');
            
    }

      public function test_psp_cr_ins_06()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('','distrito_empresa')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo distrito de empresa es obligatorio');
            
    }

      public function test_psp_cr_ins_07()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('','direccion_empresa')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo dirección de empresa es obligatorio');
            
    }

          public function test_psp_cr_ins_08()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('','equi_del_practicante')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo equipo del practicante es obligatorio');
            
    }

             public function test_psp_cr_ins_09()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type(NULL,'fecha_inicio')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo fecha de inicio es obligatorio');
            
    }

      public function test_psp_cr_ins_10()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type(NULL,'fecha_recep_convenio')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo fecha de recepción de convenio es obligatorio');
            
    }

     public function test_psp_cr_ins_11()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type(NULL,'fecha_termino')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo fecha de término es obligatorio');
            
    }


     public function test_psp_cr_ins_12()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('','jefe_directo_aux')
            ->type('nueva area','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo jefe directo auxiliar es obligatorio');
            
    }

     public function test_psp_cr_ins_13()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo nombre de área es obligatorio');
            
    }

    public function test_psp_cr_ins_14()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo personal de área es obligatorio');
            
    }

     public function test_psp_cr_ins_15()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo puesto es obligatorio');
            
    }

      public function test_psp_cr_ins_16()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo razon social es obligatorio');
            
    }

        public function test_psp_cr_ins_17()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('Razon social','razon_social')
            ->type('','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo recomendaciones es obligatorio');
            
    }

      public function test_psp_cr_ins_18()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('Razon social','razon_social')
            ->type('Recomendaciones','recomendaciones')
            ->type('','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo telefono comercial es obligatorio');
            
    }

          public function test_psp_cr_ins_19()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('Razon social','razon_social')
            ->type('Recomendaciones','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Inscripción de Empresa')
            ->see('El campo ubicación de área es obligatorio');
            
    }

      /**
     * A basic test example.
     *
     * @return void
     */
   /* public function testExample()
    {
        $this->assertTrue(true);
    }*/

    public function test_psp_cr_ins_20()
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
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription')
            ->see('Editar Inscripción de Empresa')
            ->see('La inscripción se ha registrado exitosamente');
            
    }

        public function test_psp_cr_ins_21()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('','activ_formativas')
            ->type('trabajar','actividad_economica')
            ->type('bien','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo actividades formativas es obligatorio');
            
    }

         public function test_psp_cr_ins_22()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('','actividad_economica')
            ->type('bien','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo actividad economica es obligatorio');
            
    }

      public function test_psp_cr_ins_23()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo condiciones de seguridad de área es obligatorio');
            
    }

      public function test_psp_cr_ins_24()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('','correo_jefe_directo')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo correo de jefe directo es obligatorio');
            
    }

      public function test_psp_cr_ins_25()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('','distrito_empresa')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo distrito de empresa es obligatorio');
            
    }

      public function test_psp_cr_ins_26()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('','direccion_empresa')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo dirección de empresa es obligatorio');
            
    }

          public function test_psp_cr_ins_27()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('','equi_del_practicante')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo equipo del practicante es obligatorio');
            
    }

             public function test_psp_cr_ins_28()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type(NULL,'fecha_inicio')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo fecha de inicio es obligatorio');
            
    }

      public function test_psp_cr_ins_29()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type(NULL,'fecha_recep_convenio')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo fecha de recepción de convenio es obligatorio');
            
    }

     public function test_psp_cr_ins_30()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type(NULL,'fecha_termino')
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
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo fecha de término es obligatorio');
            
    }


     public function test_psp_cr_ins_31()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('','jefe_directo_aux')
            ->type('nueva area','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo jefe directo auxiliar es obligatorio');
            
    }

     public function test_psp_cr_ins_32()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('','nombre_area')
            ->type('personal','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo nombre de área es obligatorio');
            
    }

    public function test_psp_cr_ins_33()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('','personal_area')
            ->type('nuevo','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo personal de área es obligatorio');
            
    }

     public function test_psp_cr_ins_34()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('','puesto')
            ->type('razon','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo puesto es obligatorio');
            
    }

      public function test_psp_cr_ins_35()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('','razon_social')
            ->type('mejora','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo razon social es obligatorio');
            
    }

        public function test_psp_cr_ins_36()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('Razon social','razon_social')
            ->type('','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo recomendaciones es obligatorio');
            
    }

      public function test_psp_cr_ins_37()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('Razon social','razon_social')
            ->type('Recomendaciones','recomendaciones')
            ->type('','telef_jefe_directo')
            ->type('sala','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo telefono comercial es obligatorio');
            
    }

          public function test_psp_cr_ins_38()
    {
        $user = factory(Intranet\Models\User::class)->make();

        $this->actingAs($user)
            ->withSession([
                'actions' => [],
                'user' => factory(Intranet\Models\Student::class)->make()
            ])->visit('/psp/inscription/create')
                         ->type('ar','activ_formativas')
            ->type('Buena','actividad_economica')
            ->type('Buenas condiciones','cond_seguridad_area')
            ->type('jefe@mail.com','correo_jefe_directo')
            ->type('San Juan','distrito_empresa')
            ->type('San Juan 123','direccion_empresa')
            ->type('Personas','equi_del_practicante')
            ->type('Equipo','equipamiento_area')
            ->type('10-08-2016','fecha_inicio')
            ->type('10-09-2016','fecha_recep_convenio')
            ->type('10-09-2016','fecha_termino')
            ->type('Jefe directo','jefe_directo_aux')
            ->type('Nueva area','nombre_area')
            ->type('Personal de area','personal_area')
            ->type('Practicante','puesto')
            ->type('Razon social','razon_social')
            ->type('Recomendaciones','recomendaciones')
            ->type('123456789','telef_jefe_directo')
            ->type('','ubicacion_area')
            //->check('terminos')
            ->press('Guardar')
            ->seePageIs('/psp/inscription/create')
             
            ->see('Editar Inscripción de Empresa')
            ->see('El campo ubicación de área es obligatorio');
            
    }

}

