<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Photos::class, function (Faker $faker) {
    return [
        'path' => 'uploads/galleries/photos/' . $faker->lexify('????????') . '.jpg',
    ];
});
