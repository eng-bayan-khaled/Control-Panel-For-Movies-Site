<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Admins::factory()->count(10)->create();
    }
}
