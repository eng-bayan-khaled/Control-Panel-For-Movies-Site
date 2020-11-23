<?php

namespace Database\Factories;

use App\Models\Actors;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actors::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'country' => $this->faker->country,
            'DateOfBirth' => $this->faker->date($format = 'D-m-y', $max = '2012',$min = '1990'),
            'description' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'icon_path' => $this->faker->imageUrl($width = 640, $height = 480)

        ];
    }
}


