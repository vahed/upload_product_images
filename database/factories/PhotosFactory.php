<?php

use Faker\Generator as Faker;

$factory->define(App\Photos::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->id,
		'descr' => $faker->descr,
    ];
});
