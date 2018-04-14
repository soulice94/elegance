<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    $costo = $faker->numberBetween(1000, 10000);
    $descuento = $faker->boolean ? $faker->randomDigitNotNull : null;
    return [
        //
        'nombre'        => $faker->sentence(4),
        'costo'         => $costo,
        'precio'        => $costo+$faker->numberBetween(1000, 3000),
        'unidades'      => $faker->randomDigitNotNull,
        'descuento'     => $descuento,
        'descripcion'   => $faker->sentence(8),
        'modelo'        => $faker->bothify('???###??##'),
        'codigo'        => $faker->isbn10,
        'categorias_ID' => $faker->numberBetween(1,10),
        'marcas_ID'     => $faker->numberBetween(1,10),
        'colors_ID'     => $faker->numberBetween(1,4),
        'generos_ID'    => $faker->numberBetween(1,3)
    ];
});
