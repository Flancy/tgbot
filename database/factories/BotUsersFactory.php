<?php

use Faker\Generator as Faker;

$factory->define(App\Models\BotUser\BotUser::class, function (Faker $faker) {
	$info = json_encode([
		'name' => $faker->name,
    	'chat_id' => random_int(6,20),
	]);

    return [
        'login' => str_replace('.', '_', $faker->unique()->userName),
        'info' => $info,
    ];
});
