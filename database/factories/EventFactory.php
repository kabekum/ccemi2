<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Events::class, function (Faker $faker) 
{
 	$title        = $faker->randomElement(['Bday', 'Prayer' , 'Meeting' , 'Conference' , 'Culturals' , 'Marriage' , 'Mass']);
    $select_type  = 'public';
    $description  = $faker->text;
    $location     = $faker->randomElement(['Amaravati' , 'Bengaluru' , 'Thiruvananthapuram' , 'Chennai' , 'Hyderabad' , 'Mumbai']);
    $category     = $faker->randomElement([ 'Prayer' , 'Meeting' , 'Culturals' , 'Education' ]);
    $organised_by = $faker->name;
    $image        = $faker->imageUrl($width = 640, $height = 480);
    $start_date   = Carbon::now();
    $end_date     = $faker->dateTime($max = 'now', $timezone = 'Asia/Kolkata');
    $repeats      = $faker->numberBetween($min=0,$max=1);

    if($repeats =='1')
    {
        $freq_term = $faker->randomElement(['week', 'day','month','year']);
        if($freq_term =='day')
        {
            $freq       = $faker->numberBetween($min=2,$max=30);
            $start_date = Carbon::now();
            $end_date   = $faker->dateTimeInInterval($endDate = '+'.$freq. ' days');
        }
        elseif($freq_term =='week')
        {
            $freq        = $faker->numberBetween($min=1,$max=4);
            $start_date  = Carbon::now();
            $end_date    = $faker->dateTimeInInterval($endDate = '+'.$freq. ' week');
        }
        elseif($freq_term =='month')
        {
            $freq        = $faker->numberBetween($min=1,$max=12);
            $start_date  = Carbon::now();
            $end_date    = $faker->dateTimeInInterval($endDate = '+'.$freq. ' month');
        }
        elseif($freq_term =='year')
        {
            $freq        = $faker->numberBetween($min=1,$max=2);
            $start_date  = Carbon::now();
            $end_date    = $faker->dateTimeInInterval($endDate = '+'.$freq. ' year');
        }
    }
    else
    {
        $freq       = null;
        $freq_term  = null;

        $start_date = Carbon::now();
        $end_date   = Carbon::now()->addHours(2);
    }

    return [
        'select_type'  => $select_type,
        'title'        => $title,
        'description'  => $description,
        'repeats'      => $repeats,
        'freq'         => $freq,
        'freq_term'    => $freq_term,
        'location'     => $location,
        'category'     => $category,
        'organised_by' => $organised_by,
        //'image'        => $image,
        'start_date'   => $start_date,
        'end_date'     => $end_date,
    ];
});