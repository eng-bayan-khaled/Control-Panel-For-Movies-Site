<?php

namespace Database\Factories;

use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Series::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'release_date' => $this->faker->numberBetween($min = 2000, $max = 2020),
            'poster_path' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}

