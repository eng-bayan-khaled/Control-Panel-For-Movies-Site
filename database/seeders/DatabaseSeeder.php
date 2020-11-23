<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder​::class);
        $this->call(ActorsTableSeeder​::class);
        $this->call(ArticlesTableSeeder​::class);
        $this->call(CategoriesTableSeeder​::class);
        $this->call(CommentsTableSeeder​::class);
        $this->call(EpisodesTableSeeder​::class);
        $this->call(GenresTableSeeder​::class);
        $this->call(KeywordsTableSeeder​::class);
        $this->call(LikesTableSeeder​::class);
        $this->call(MoviesTableSeeder​::class);
        $this->call(ReviewsTableSeeder​::class);
        $this->call(SeasonsTableSeeder​::class);
        $this->call(SeriesTableSeeder​::class);
        $this->call(TagsTableSeeder​::class);
        $this->call(UsersTableSeeder​::class);
    }
}
