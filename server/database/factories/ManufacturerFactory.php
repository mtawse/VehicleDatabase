<?php

use Faker\Generator as Faker;

$factory->define(App\Manufacturer::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
    ];
});
