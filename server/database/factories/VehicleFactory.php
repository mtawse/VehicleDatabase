<?php

use Faker\Generator as Faker;

$factory->define(App\Vehicle::class, function (Faker $faker) {
    $licensePlateFaker = \Faker\Factory::create('ms_MY');
    return [
        'manufacturer_id' => function () {
                return factory(App\Manufacturer::class)->create()->id;
        },
        'model_id' => function () {
                return factory(App\Model::class)->create()->id;
            },
        'owner_id' => function () {
                return factory(App\Owner::class)->create()->id;
        },

        'type' => $faker->randomElement(['diesel', 'electric', 'hybrid', 'petrol']),
        'usage' => $faker->randomElement(['business', 'personal']),
        'license_plate' => $licensePlateFaker->jpjNumberPlate,
        'weight_category' => $faker->numberBetween(1, 50),
        'no_seats' => $faker->numberBetween(0, 7),
        'has_boot' => $faker->boolean(75),
        'has_trailer' => $faker->boolean(10),
        'transmission' => $faker->randomElement(['automatic', 'semi-automatic', 'manual']),
        'colour' => $faker->colorName,
        'is_hgv' => $faker->boolean(5),
        'no_doors' => $faker->numberBetween(0, 7),
        'has_sunroof' => $faker->boolean(50),
        'has_gps' => $faker->boolean(50),
        'no_wheels' => $faker->numberBetween(1, 20),
        'engine_cc' => $faker->numberBetween(500, 20000),
        'fuel_type' => $faker->randomElement(['diesel', 'duel', 'electric', 'petrol']),
    ];
});
