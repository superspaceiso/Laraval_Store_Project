<?php

use Faker\Generator as Faker;

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

$factory->define(App\Users::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$RWl3W4MU2kkDiqcuFnYp9u9w8eF0dTlYWTu4SgKBItLHfsX7w/ttC', // secret
        'remember_token' => Str::random(10),
    ];
});
