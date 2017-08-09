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

$factory->define(App\Perfil::class, function (Faker\Generator $faker) {
    return [
        'perfil' => $faker->unique()->randomElement(array('Admin', 'Jefe de cuenta', 'Call Center', 'Developer')),
        'estado' => $faker->randomElement(array('activo'))
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
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
        "user" => $faker->userName,
        "password" => bcrypt("12345678"),
        "contacto_emergencia" => $faker->colorName,
        "telef_contacto" => $faker->phoneNumber,
        "id_perfil" => $faker->randomElement(array(1,2,3)),
        "turno" => $faker->randomElement(array('Mañana', 'Tarde', 'Noche')),
        'remember_token' => str_random(10)
    ];
});


$factory->define(App\Rubro::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->unique()->randomElement(array('Marketing', 'Informática', 'Soporte', 'Cobranzas', 'Todista', 'Carpintería', 'Zapatería')),
        'descripcion' => $faker->text
    ];
});

$factory->define(App\Proveedor::class, function (Faker\Generator $faker) {
    return [
        'razon_social' => $faker->company,
        'ruc' => $faker->unique()->randomNumber(8)."".$faker->randomNumber(3),
        'id_rubro' => $faker->randomElement(array(1,2,3,4,5,6,7)),
        'telefono1' => $faker->randomNumber(9),
        'telefono2' => $faker->randomNumber(9),
        'telefono3' => $faker->randomNumber(7),
        'representante' => $faker->name,
        'contacto' => $faker->name,
        'telf_contacto' => $faker->randomNumber(9)
    ];
});

$factory->define(App\TiposProducto::class, function (Faker\Generator $faker) {
    return [
        'tipo_producto' => $faker->unique()->randomElement(array('Consumo', 'Masiva', 'Mype', 'Hipotecario', 'Tarjeta de crédito'))
    ];
});

$factory->define(App\Producto::class, function (Faker\Generator $faker) {
    return [
        'producto' => $faker->unique()->randomElement(array('Visa', 'Mastercard', 'Préstamo personal', 'Préstamo Hipotecario', 'Libre consumo')),
        'id_tipo_producto' => $faker->randomElement(array(1,2,3,4,5))
    ];
});

$factory->define(App\Modelos\TipoResultados::class, function (Faker\Generator $faker) {
    return [
        'tipo_resultado' => $faker->unique()->randomElement(array('Contacto Directo', 'Contacto Indirecto', 'Contacto Efectivo', 'No contacto', 'Ilocalizado', 'No llamar')),
        'peso' => $faker->randomElement(array(5,6,7,8,9,3))
    ];
});

$factory->define(App\Modelos\Resultado::class, function (Faker\Generator $faker) {
    return [
        'id_tipo_resultado' => $faker->randomElement(array(1,2,3,4,5)),
        'resultado' => $faker->unique()->randomElement(array('Ya pagó', 'Promesa de pago', 'Motivo de no pago', 'Desacuerdo', 'Se dejó mensaje', 'No se deja mensaje', 'Fallecido', 'Teléfono errado', 'Colgó'))
    ];
});

$factory->define(App\Justificacion::class, function (Faker\Generator $faker) {
    return [
        'justificacion' => $faker->unique()->randomElement(array('PKM-REF pendiente ajuste', 'Pago Mora Total', 'Establecimiento afiliado', 'Envio voucher por correo'))
    ];
});

$factory->define(App\EquipoTrabajo::class, function (Faker\Generator $faker) {
    return [
        'equipo_trabajo' => $faker->unique()->colorName
    ];
});

$factory->define(App\TipoDireccion::class, function (Faker\Generator $faker) {
    return [
        'tipo_direccion' => $faker->unique()->randomElement(array('Domicilio', 'Laboral', 'Sunat', 'Legal'))
    ];
});

$factory->define(App\EquipoTrabajoCartera::class, function (Faker\Generator $faker) {
    return [
        'id_proveedor' => $faker->randomElement(array(1,5,7,8,9,10,14,20,25,23,22,15,13,12,11,6,4,3,2)),
        'id_cartera' => $faker->randomElement(array(1,2,3,4)),
        'id_perfil' => $faker->randomElement(array(1,2,3,4)),
        'id_usuario' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
        'id_equipo' => $faker->randomElement(array(1,5,6,8,7,4,9,15,11,2,12,13,14,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
        'id_segmento' => $faker->randomElement(array(1,2,3,4))
    ];
});

$factory->define(App\Modelos\TipoContacto::class, function (Faker\Generator $faker) {
    return [
        'tipo_contacto' => $faker->unique()->randomElement(array('Titular', 'Familiar', 'Conyuge', 'Padre', 'Hijo', 'Amistad', 'Vecino', 'Compañero de trabajo'))
    ];
});

$factory->define(App\ProductoCartera::class, function (Faker\Generator $faker) {
    return [
        'id_proveedor' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
        'id_producto' => $faker->randomElement(array(1,2,3,4,5)),
        'id_cartera' => $faker->randomElement(array(1,2,3,4))
    ];
});

$factory->define(App\Modelos\ProductoProveedor::class, function (Faker\Generator $faker) {
    return [
        'id_proveedor' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
        'id_producto' => $faker->randomElement(array(1,2,3,4,5))
    ];
});

$factory->define(App\TipoContactoResultado::class, function (Faker\Generator $faker) {
    return [
        'id_resultado' => $faker->unique()->randomElement(array(1,2,3,4,5,6,7,8,9)),
        'id_tipo_contacto' => $faker->randomElement(array(1,2,3,4,5,6,7,8))
    ];
});

$factory->define(App\PaletaResultado::class, function (Faker\Generator $faker) {
    return [
        'id_proveedor' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
        'id_cartera' => $faker->randomElement(array(1,2,3,4)),
        'id_resultado' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9)),
        'id_justificacion' => $faker->randomElement(array(1,2,3,4))
    ];
});

//$factory->define(App\PaletaResultado::class, function (Faker\Generator $faker) {
//    return [
//        'id_proveedor' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
//        'id_cartera' => $faker->randomElement(array(1,2,3,4,5,6,7,8)),
//        'id_resultado' => $faker->randomElement(array()),
//        'id_justificacion' => $faker->randomElement(array())
//    ];
//});







//$factory->define(App\Cartera::class, function (Faker\Generator $faker) {
//    return [
//        'id_proveedor' => $faker->randomElement(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
//        'id_tipo_cartera' => $faker->randomElement(array('1','2','3','4','5','6','7')),
//        'cartera' => $faker->slug
//    ];
//});


//$factory->define(App\Modelos\TiposCartera::class, function (Faker\Generator $faker) {
//    return [
//        'tipo_cartera' => $faker->unique()->randomElement(array('Vigente', 'Castigada', 'Judicial', 'Especial', 'Provincia', 'Judicial', 'Big ticket'))
//    ];
//});


//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});



//$factory->define(App\Proveedor::class, function (Faker\Generator $faker) {
//    return [
//        "razon_social" => $faker->company,
//        "ruc" => $faker->randomNumber(9),
//        "rubro" => $faker->randomElement(array("Carpintero", "Electricista", "Gasfitero", "Plomero", "Analista de sistemas", "Programador", "Diseñador", "Modelador")),
//        "telefono1" => $faker->phoneNumber,
//        "telefono2" => $faker->phoneNumber,
//        "telefono3" => $faker->phoneNumber,
//        "representante" => $faker->name,
//        "contacto" => $faker->name,
//        "telf_contacto" => $faker->phoneNumber
//    ];
//});