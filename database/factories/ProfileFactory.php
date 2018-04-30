<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {

    $users = App\User::all()->pluck('id')->toArray();
    $sex = $faker->randomElement(['male', 'female']);
    $image_path = '/img'.($sex=='male'?'/avatarmale.png':'/avatarfemale.png');
    return [
      'user_id' => $faker->unique()->randomElement($users),
      'fname' => $faker->firstName,
      'lname' => $faker->lastName,
      'birthday' => $faker->date($format = 'Y-m-d', $max = '-5 years'),
      'sex' => $sex,
      'tel' => $faker->phoneNumber,
      'address' => $faker->address,
      'coin' => $faker->numberBetween($min=0, $max= 100),
      'image_path' => $image_path,
    ];
});
