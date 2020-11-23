<?php

namespace Database\Factories;

use App\Models\Episodes;
use App\Models\Seasons;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episodes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'summary' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'duration' => $this->faker->numberBetween($min = 30, $max = 200),
            'season_id' => Seasons::factory()->create()->id,
        ];
    }
}
