<?php

namespace Database\Factories;

use App\Models\Likes;
use App\Models\Users;
use App\Models\Movies;
use App\Models\Episodes;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Likes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'like' => $this->faker->numberBetween($min = 0, $max = 1),
            'user_id' => Users::factory()->create()->id,
            'movie_id' => Movies::factory()->create()->id,
            'episode_id' => Episodes::factory()->create()->id,

        ];
    }
}
