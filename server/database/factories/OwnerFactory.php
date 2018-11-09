<?php

use Faker\Generator as Faker;

$factory->define(App\Owner::class, function (Faker $faker) {
    return [
        'salutation' => $faker->optional($weight = 0.5)->title,
        'first_name' => $faker->firstName,
        'initials' => $faker->optional($weight = 0.1)->randomLetter,
        'last_name' => $faker->lastName,
        'suffix' => $faker->optional($weight = 0.5)->suffix,
        'company' => $faker->words(2, true),
        'profession' => $faker->words(2, true),
    ];
});
