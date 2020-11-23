<?php

namespace Database\Factories;

use App\Models\Movies;
use Illuminate\Database\Eloquent\Factories\Factory;

class MoviesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'release_date' => $this->faker->date($format = 'D-m-y', $max = '2012',$min = '1990'),
            'duration' => $this->faker->numberBetween($min = 30, $max = 200),
            'poster_path' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
