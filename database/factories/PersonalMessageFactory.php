<?php

use Faker\Generator as Faker;

$factory->define(App\PersonalMessage::class, function (Faker $faker) {
	
	$users = \App\User::all()->pluck('id')->toArray();
	$sender = $faker->randomElement($users);
	
	while (true){
		$reciever = $faker->randomElement($users);
		if ($sender !== $reciever){
			break;
		}
	}
	$message = $faker->word." ".$faker->word;
	$time = $faker->time;
	return [
		'sender_id' => $sender,
		'reciever_id' => $reciever,
		'message' => $message,
		'time' => $time
	];
}); 
