<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {

    $users = App\User::all()->pluck('id')->toArray();

    return [
      'user_id' => $faker->unique()->randomElement($users),
      'fname' => $faker->firstName,
      'lname' => $faker->lastName,
      'birthday' => $faker->date($format = 'Y-m-d', $max = '-5 years'),
      'sex' => $faker->randomElement(['male', 'female']),
      'tel' => $faker->phoneNumber,
      'address' => $faker->address,
      'coin' => $faker->numberBetween($min=0, $max= 100)
    ];
});
