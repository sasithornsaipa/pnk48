<?php

use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    $reporter_id = App\User::all()->pluck('id')->toArray();
    $reported_id = App\User::all()->pluck('id')->toArray();
    return [
        'reportor_id'=>$faker->randomElement($reporter_id),
        'reported_id'=>$faker->randomElement($reported_id),
        'description'=>$faker->realText()
    ];
});
