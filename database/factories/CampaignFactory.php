<?php

use Faker\Generator as Faker;

$factory->define(App\Campaign::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'description' => $faker->catchPhrase,
        'active' => $faker->boolean(),
    ];
});
