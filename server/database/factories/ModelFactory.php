<?php

use Faker\Generator as Faker;

$factory->define(App\Model::class, function (Faker $faker) {
    return [
        'manufacturer_id' => function () {
                return factory(App\Manufacturer::class)->create()->id;
            },
        'name' => $faker->text(10),
    ];
});
