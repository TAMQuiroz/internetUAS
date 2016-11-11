<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Intranet\Models\User::class, function (Faker\Generator $faker) {
    return [
        'IdPerfil'          => 2,
        'Usuario'           => $faker->userName,
        'Contrasena'        => bcrypt(str_random(10)),
    ];
});

$factory->defineAs(Intranet\Models\User::class, 'coordinador_especialidad',function (Faker\Generator $faker) {
    return [
        'IdPerfil'          => 1,//coordinador de especialidad
        'Usuario'           => $faker->userName,
        'Contrasena'        => bcrypt(str_random(10)),
    ];
});

$factory->define(Intranet\Models\Teacher::class, function (Faker\Generator $faker) {
    return [
    	'IdEspecialidad'    =>  1,
    	'Codigo'	        =>	$faker->randomNumber($nbDigits = 8,$strict = true),
        'Nombre'            =>  $faker->firstNameMale,
        'ApellidoPaterno'   =>	$faker->lastName,
        'ApellidoMaterno'   =>	$faker->lastName,
        'Correo'			=>	$faker->email,
        'Cargo'				=>	$faker->text,
        'Vigente'			=>	1,
        'Descripcion'		=>	$faker->text,
    ];
});

$factory->define(Intranet\Models\Area::class, function (Faker\Generator $faker) {
    return [
        'nombre'          => $faker->jobTitle,
        'descripcion'     => $faker->text,
    ];
});

$factory->define(Intranet\Models\Investigator::class, function (Faker\Generator $faker) {
    return [
        'id_usuario'        => 51,
        'nombre'            => $faker->firstNameMale,
        'ape_paterno'       => $faker->lastName,
        'ape_materno'       => $faker->lastName,
        'correo'            => $faker->email,
        'celular'           => 999999999,
        'id_especialidad'   => 1,
        'id_area'           => 1,
        'Vigente'           => 1,
    ];
});


$factory->define(Intranet\Models\Template::class, function (Faker\Generator $faker) {
    return [
        'idphase'          => 1,
        'titulo'          => $faker->text,
    ];
});

$factory->define(Intranet\Models\Supervisor::class, function (Faker\Generator $faker) {
    return [
        'nombres'           => $faker->firstNameMale,
        'apellido_paterno'   => $faker->lastName,
        'apellido_materno'   => $faker->lastName,
        'correo'            => $faker->email,
        'telefono'          => 999999999,
        'direccion'         => $faker->lastName,
        'codigo_trabajador'  => $faker->randomNumber($nbDigits = 8,$strict = true),
        'idFaculty'         => 1,
        'idUser'            => 3,
        'Vigente'            => 1,
    ];
});

$factory->define(Intranet\Models\PspGroup::class, function (Faker\Generator $faker) {
    return [
        'numero'          => 1,
        'descripcion'     => $faker->text,
    ];
});

$factory->define(Intranet\Models\Tutstudent::class, function (Faker\Generator $faker) {
    return [
        'id_especialidad'    =>  1,
        'codigo'            =>  $faker->randomNumber($nbDigits = 8,$strict = true),
        'nombre'            =>  $faker->firstNameMale,
        'ape_paterno'       =>  $faker->lastName,
        'ape_materno'       =>  $faker->lastName,
        'correo'            =>  $faker->email,        
    ];
});

$factory->define(Intranet\Models\Group::class, function (Faker\Generator $faker) {

    return [
        'nombre'            => 'Grupo de prueba',
        'id_especialidad'   => 1,
        'descripcion'       => $faker->text,
        'id_lider'          => 1,
    ];
});

$factory->define(Intranet\Models\Project::class, function (Faker\Generator $faker) {

    $grupo  =   factory(Intranet\Models\Group::class)->create();

    return [
        'nombre'            =>  'Proyecto de prueba',
        'descripcion'       =>  $faker->text,
        'num_entregables'   =>  5,
        'fecha_ini'         =>  '2017-10-06',
        'fecha_fin'         =>  '2018-10-06',
        'id_grupo'          =>  $grupo->id,
        'id_area'           =>  1,
        'id_status'         =>  1,

    ];
});

$factory->define(Intranet\Models\Student::class, function (Faker\Generator $faker) {

    return [
        'IdAlumno'            =>  $faker->randomNumber($nbDigits = 8,$strict = true),
    ];
});

$factory->define(Intranet\Models\PspStudent::class, function (Faker\Generator $faker) {
    $student =   factory(Intranet\Models\Student::class)->create();
    $psp =   factory(Intranet\Models\PspProcess::class)->create();

    return [
        'idalumno'            =>  $student->IdAlumno,
        'idpspprocess'        =>  $psp->id,
    ];
});

$factory->define(Intranet\Models\Competence::class, function (Faker\Generator $faker) {
    return [
        'nombre'            =>  'Competencia '.$faker->randomNumber($nbDigits = 3,$strict = true),
        'descripcion'       =>  $faker->text,
        'id_especialidad'   =>  1,
    ];
});


$factory->define(Intranet\Models\Question::class, function (Faker\Generator $faker) {
    return [        
        'tipo'               =>  2,
        'tiempo'             =>  1,
        'puntaje'            =>  1,
        'dificultad'         =>  1,
        'descripcion'        =>  $faker->text,
        'requisito'          =>  $faker->text,
        'id_especialidad'    =>  1,
        'id_docente'         =>  4,
        'id_competence'      =>  1,
    ];
});



$factory->define(Intranet\Models\FreeHour::class, function (Faker\Generator $faker) {
    return [
        'hora_ini'          => 8,
        'fecha'     => \Carbon\Carbon::yesterday(),
        'cantidad' => 1,
    ];
});

$factory->define(Intranet\Models\PspProcess::class, function (Faker\Generator $faker) {
    return [
        'idespecialidad' => 1,
        'idCiclo'       => 1,
        'idcurso'        => 1,
    ];
});

$factory->define(Intranet\Models\PspProcessxTeacher::class, function (Faker\Generator $faker) {
    return [
        'idpspprocess' => 1,
        'iddocente'       => 1,
    ];
});

$factory->define(Intranet\Models\Phase::class, function (Faker\Generator $faker) {

    $psp =   factory(Intranet\Models\PspProcess::class)->create();

    return [
        'numero'            =>  $faker->randomNumber($nbDigits = 1,$strict = true),
        'descripcion'       =>  $faker->text,
        'fecha_inicio'      =>  '2017-10-06',
        'fecha_fin'         =>  '2018-10-06',
        'idpspprocess'      =>  $psp->id,
    ];
});

$factory->define(Intranet\Models\Schedule_meetings::class, function (Faker\Generator $faker) {

    $phase =   factory(Intranet\Models\Phase::class)->create();
    
    return [
        'id'            =>  $faker->randomNumber($nbDigits = 6,$strict = true),
        'idpspprocess' => 1,
        'tipo' => 'Jefe-Supervisor',
        'idfase'  => $phase->id,
        'idpspprocess'      =>  $phase->idpspprocess,
    ];
});

$factory->define(Intranet\Models\Template::class, function (Faker\Generator $faker) {

    $phase =   factory(Intranet\Models\Phase::class)->create();

    return [
        'idphase'          => $phase->id,
        'titulo'          => $faker->text,
        'numerofase'    =>  $phase->numero,
        'idtipoestado'  => 1,
    ];
});

$factory->define(Intranet\Models\PspDocument::class, function (Faker\Generator $faker) {

    $template =   factory(Intranet\Models\Template::class)->create();
    $student =   factory(Intranet\Models\Student::class)->create();

    return [
        'es_obligatorio'       =>  's',
        //'observaciones'       =>  'bien',
        //'ruta'               =>  'uploads/pspdocuments/0.pdf',
        'idstudent'         =>  $student->IdAlumno,
        //'idstudent'         =>  1,
        'idtemplate'         =>  $template->id,
        'titulo_plantilla'    =>   $template->titulo,
        'ruta_plantilla'     =>   $template->ruta,
        'idtipoestado'         =>  3,
        'fecha_limite'         =>  '2018-10-06',
        'numerofase'           =>  1,
    ];
});

$factory->define(Intranet\Models\PspGroup::class, function (Faker\Generator $faker){
   return[
        'numero' => $faker->numberBetween($min = 1, $max = 9),
        'descripcion' => $faker->text($maxNbChars = 100) ,
   ];
});

$factory->define(Intranet\Models\meeting::class, function (Faker\Generator $faker){
   return[
        'idtipoestado' => 12 ,
        'hora_inicio' => '10:00:00' ,
        'hora_inicio' => '11:00:00' ,
        'fecha' => \Carbon\Carbon::yesterday(),
        'lugar' => 'V202',
        'idstudent' => 41,
        'asistencia' => 'o',
        'tiporeunion' => 2,
   ];
});
