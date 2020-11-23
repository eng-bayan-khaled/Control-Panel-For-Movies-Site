<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\Users;
use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->name,
            'status' => $this->faker->numberBetween($min = 0, $max = 3),
            'user_id' => Users::factory()->create()->id,
            'article_id' => Articles::factory()->create()->id,
        ];
    }
}
