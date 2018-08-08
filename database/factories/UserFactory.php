<?php

use Faker\Generator as Faker;
use App\User;

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
$user = App\User::class;

$factory->define($user, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'gender' => rand(0, 1),
        // 'profile_photo' => $user->gender == 1 ? 'public/defaults/male.png' : 'public/defaults/female.png',
        'api_token' => str_random(60),
        'remember_token' => str_random(10),
    ];
});
