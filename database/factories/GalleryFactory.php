<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gallery::class, function (Faker $faker) {
    $topics = [
        'Sunday Service', 'Easter Celebration', 'Christmas Mass', 'Baptism Ceremony',
        'Youth Camp', 'Harvest Festival', 'Parish Picnic', 'Confirmation Day',
        'Mission Trip', 'Choir Concert', 'Community Outreach', 'Thanksgiving Service',
    ];

    return [
        'name'        => $faker->randomElement($topics) . ' ' . $faker->year(),
        'description' => $faker->optional(0.7)->sentence(),
        'path'        => 'uploads/galleries/' . $faker->lexify('????????'),
    ];
});
