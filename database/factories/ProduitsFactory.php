<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'designation' => 'Pr' . $faker->numberBetween(1, 1000),
        'prix_unitaire' => $faker->numberBetween(0.01, 100.50),
        'unite_mesure' => $faker->randomElement(array('mètre', 'kilogram', 'litre')),
        'quantité' => $faker->numberBetween(0, 100)
    ];
});
