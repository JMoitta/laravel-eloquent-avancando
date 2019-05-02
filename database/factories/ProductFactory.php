<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => implode(' ', $faker->paragraphs()),
        'deleted_at' => null,
        'activated' => rand(0, 1),
        // 'user_id' => function() {
        //     return factory(\App\User::class)->create()->id;
        // }
    ];
});
