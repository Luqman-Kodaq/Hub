<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 20),
        'about' => $faker->sentence,
        'facebook' => $faker->unique()->safeEmail,
        'twitter' => $faker->unique()->safeEmail,
        'instagram' => $faker->unique()->safeEmail,
    ];
});
