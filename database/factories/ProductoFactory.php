<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    $costo = $faker->numberBetween(1000, 10000);
    return [
        //
        'nombre'        => $faker->sentence(4),
        'costo'         => $costo,
        'precio'        => $costo+$faker->numberBetween(1000, 3000),
        'unidades'      => $faker->randomDigitNotNull,
        'descuento'     => $faker->randomDigit,
        'descripcion'   => $faker->sentence(8),
        'modelo'        => $faker->isbn10,
        'codigo'        => $faker->bothify('???###??##'),
        'categorias_ID' => $faker->numberBetween(1,10),
        'marcas_ID'     => $faker->numberBetween(1,10),
        'colors_ID'     => $faker->numberBetween(1,3),
        'generos_ID'    => $faker->numberBetween(1,3)
    ];
});
