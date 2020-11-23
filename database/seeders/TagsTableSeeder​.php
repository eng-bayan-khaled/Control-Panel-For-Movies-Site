<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tags::factory()->count(10)->create();
    }
}
