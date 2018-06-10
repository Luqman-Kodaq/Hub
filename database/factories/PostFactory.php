<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'slug' => $faker,
      'user_id' => $faker,
      'contents' => $faker->paragraphs(rand(3, 10), true),
      'published' => $faker->boolean,
      'category_id' => $faker,
    ];
});