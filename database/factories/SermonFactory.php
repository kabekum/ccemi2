<?php

namespace Database\Factories;

use App\Models\Sermon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SermonFactory extends Factory
{
    protected $model = Sermon::class;

    public function definition(): array
    {
        return [
            'title'       => $this->faker->realText(rand(10, 20)),
            'description' => $this->faker->realText(rand(40, 50)),
            'cover_image' => $this->faker->imageUrl(640, 480),
        ];
    }
}
