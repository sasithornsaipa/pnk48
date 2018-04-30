<?php

use Faker\Generator as Faker;

$factory->define(App\PersonalMessage::class, function (Faker $faker) {
    $sender = \App\User::where('id', '!=', 2)->first();
	$reciever = 2;
	$message = $faker->word;
	$time = 'now';
	return [
			'sender_id' => $sender,
			'reciever_id' => $reciever,
			'message' => $message,
			'time' => $time
			];
}); 
