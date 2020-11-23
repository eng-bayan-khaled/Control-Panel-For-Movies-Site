<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EpisodesTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Episodes::factory()->count(10)->create();
    }
}
