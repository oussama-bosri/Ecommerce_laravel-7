<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $product_name = $faker->sentence();
    return [
        "product_name" => $product_name,
        "qty" => $faker->numberBetween($min = 1, $max = 10),
        "price" => $faker->numberBetween($min = 100, $max = 900),
        "total" => $faker->numberBetween($min = 1000, $max = 9000),
        "user_id" => $faker->numberBetween($min = 1, $max = 10),
    ];
});
