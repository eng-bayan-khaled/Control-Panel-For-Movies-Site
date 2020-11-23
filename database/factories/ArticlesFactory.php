<?php

namespace Database\Factories;

use App\Models\Articles;
use App\Models\Admins;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->companyEmail,
            'auther_id' => Admins::factory()->create()->id,
        ];
    }
}


// 'company_id' => factory(App\Company::class)->create()->id,

// App\Models\Admins::factory()->create()->id;

// $article = \App\models\Articles::find($article->id);
// $keyword = \App\models\Keywords::find($keyword);
// $article->keywords()->attach($keyword);

// $ar = \App\Models\Admins::factory()->create();
// $ar->keywords()->attach($keyword);
