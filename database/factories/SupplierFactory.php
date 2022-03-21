<?php

namespace Database\Factories;

use App\Models\Supplier;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'razon_social' => $faker->company,
        'heading_id' => rand(1,4),
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
