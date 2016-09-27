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

$factory->define(Intranet\Models\Teacher::class, function (Faker\Generator $faker) {
    return [
    	'IdEspecialidad'    =>  1,
    	'Codigo'	        =>	$faker->randomNumber($nbDigits = 8),
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
        'id_usuario'        => 2,
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

