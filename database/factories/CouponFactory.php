<?php

use Faker\Generator as Faker;

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'discount' => $faker->numberBetween($min = 5, $max = 100),
        'exp' => $faker->date($min = '+2 month'),
        'code' => $faker->word
    ];
});
