<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenresTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Genres::factory()->count(10)->create();
    }
}
