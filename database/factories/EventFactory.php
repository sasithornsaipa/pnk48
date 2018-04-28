<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName,
        'reward'=>$faker->randomElement(['coupon', 'coin']),
        'description'=>$faker->realText(),
        'mission_type'=>$faker->randomElement(['normal', 'rcgame', 'htGame']),
        'start_time'=>$faker->randomElement(['morning', 'evening', 'afternoon']),
        'end_time'=>$faker->randomElement(['morning', 'evening', 'afternoon'])
    ];
});
