<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bulletin::class, function (Faker $faker) {
    $type  = $faker->randomElement(['month', 'week']);
    $year  = $faker->numberBetween(2018, 2026);

    if ($type === 'week') {
        $week  = $faker->numberBetween(1, 52);
        $month = null;
        $name  = "Weekly Bulletin – Week {$week}, {$year}";
    } else {
        $week  = null;
        $month = $faker->numberBetween(1, 12);
        $name  = "Monthly Bulletin – " . \Carbon\Carbon::create($year, $month)->format('F Y');
    }

    return [
        'name'        => $name,
        'cover_image' => 'uploads/bulletins/cover_' . $faker->lexify('??????') . '.jpg',
        'type'        => $type,
        'week'        => $week,
        'month'       => $month,
        'year'        => $year,
        'path'        => 'uploads/bulletins/bulletin_' . $faker->lexify('??????') . '.pdf',
    ];
});
