<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Cuenta::class, function (Faker $faker) {
    return [
        'razon_social' => $faker->company,
        'email' => $faker->email,
        'documento' => $faker->numerify('###########'),
        'direccion' => $faker->address,
        'localidad_id' => 3317,
        'provincia_id' => 3,
        'codigo_postal' => $faker->postcode,
        'telefono' => $faker->numerify('########'),
        'contacto_nombre' => $faker->firstName,
        'contacto_cargo' => $faker->lastName,
        'observaciones' => $faker->text(150)
    ];
});
