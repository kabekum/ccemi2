<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gallery::class, function (Faker $faker) {
    $topics = [
        'Sunday Service',
        'Easter Celebration',
        'Christmas Mass',
        'Baptism Ceremony',
        'Youth Camp',
        'Harvest Festival',
        'Parish Picnic',
        'Confirmation Day',
        'Mission Trip',
        'Choir Concert',
        'Community Outreach',
        'Thanksgiving Service',
    ];

    $paths = [
        'uploads/Images/Galleries/galleries.jpg',
        'uploads/Images/Galleries/galleries1.jpg',
        'uploads/Images/Galleries/galleries2.jpg',
        'uploads/Images/Galleries/galleries3.jpg',
        'uploads/Images/Galleries/galleries4.jpg',
        'uploads/Images/Galleries/galleries5.jpg',
        'uploads/Images/Galleries/galleries6.jpg',
        'uploads/Images/Galleries/galleries7.jpg',
        'uploads/Images/Galleries/galleries8.jpg',
        'uploads/Images/Galleries/galleries9.jpg',
    ];
    $randomCoverImage = $paths[array_rand($paths)];

    return [
        'name'        => $faker->randomElement($topics) . ' ' . $faker->year(),
        'description' => $faker->optional(0.7)->sentence(),
        'path'        => url($randomCoverImage),
    ];
});
