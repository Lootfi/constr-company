<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'role' => 'Client',
        'nom' => $faker->lastName(),
        'prenom' => $faker->firstName(),
        'ville' => $faker->randomElement(array('Mostaganem', 'Oran', 'Alger', 'Djelfa', 'Annaba', 'Biskra', 'Tindouf', 'Bechar', 'Tlemcen')),
        'num_tel' => '0' . $faker->numberBetween(521022221, 799022221),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
