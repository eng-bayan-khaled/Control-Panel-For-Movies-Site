<?php

namespace Database\Factories;

use App\Models\Seasons;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seasons::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'summary' => $this->faker->name,
            'season_number' => $this->faker->numberBetween($min = 1, $max = 10),
            'duration' => $this->faker->numberBetween($min = 40, $max = 200),
            'poster_path' => $this->faker->imageUrl($width = 640, $height = 480),
            'series_id' => Series::factory()->create()->id,
        ];
    }
}
