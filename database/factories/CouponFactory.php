<?php

use Faker\Generator as Faker;

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'discount' => $faker->numberBetween($min = 5, $max = 100),
        'exp' => $faker->dateTimeBetween('-1 week', '+3 month'),
        'code' => $faker->word
    ];
});
