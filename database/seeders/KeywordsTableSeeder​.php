<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeywordsTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Keywords::factory()->count(10)->create();
    }
}
