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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    return [
        "dni" => $faker->randomNumber(8),
        "ap_paterno" => $faker->lastName,
        "ap_materno" => $faker->lastName,
        "nombres" => $faker->name,
        "fecnac" => $faker->date(),
        "est_civil" => $faker->randomElement(array('Soltero/a', 'Casado/a', 'Viudo/a', 'Divorciado/a')),
        "fec_ingreso" => $faker->date(),
        "movil" => $faker->phoneNumber,
        "fijo" => $faker->phoneNumber,
        "direccion" => $faker->streetAddress,
        "idubigeo" => $faker->randomElement(array("010101","010102","010103","100204","140106","131015","140109","150101","030506","040406","050524","050616","080106","080409")),
        "email_corp" => $faker->companyEmail,
        "email_per" => $faker->email,
        "login" => $faker->userName,
        "contacto_emergencia" => $faker->colorName,
        "telef_contacto" => $faker->phoneNumber,
        "id_perfil" => $faker->randomElement(array(1,2,3)),
        "turno" => $faker->randomElement(array('Mañana', 'Tarde', 'Noche')),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Proveedor::class, function (Faker\Generator $faker) {
    return [
        "razon_social" => $faker->company,
        "ruc" => $faker->randomNumber(9),
        "rubro" => $faker->randomElement(array("Carpintero", "Electricista", "Gasfitero", "Plomero", "Analista de sistemas", "Programador", "Diseñador", "Modelador")),
        "telefono1" => $faker->phoneNumber,
        "telefono2" => $faker->phoneNumber,
        "telefono3" => $faker->phoneNumber,
        "representante" => $faker->name,
        "contacto" => $faker->name,
        "telf_contacto" => $faker->phoneNumber
    ];
});