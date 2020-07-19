<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->word,
        'description' => $faker->realText(100),
        'price' => rand(1,1000),
        'quantity' => rand(1,100),
        'size' => Str::random(10),
        'category_id' => function() {
            return factory(\App\Category::class)->create()->id;
        },

    ];
});
