<?php

use Faker\Generator as Faker;

$factory->define(App\VerificationDoc::class, function (Faker $faker) {

    $users = App\User::where('verified', true)->get()->toArray();

    return [
        'user_id' => $faker->unique()->randomElement($users),
    ];
});
