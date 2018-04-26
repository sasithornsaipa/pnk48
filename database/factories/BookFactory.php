<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'isbn' => $faker->isbn13,
      'barcode' => $faker->ean13,
      'author' => $faker->name,
      'description' => $faker->text($maxNbChars = 100)
    ];
});
