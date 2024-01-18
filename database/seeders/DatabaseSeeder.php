<?php

namespace Database\Seeders;

use App\Models\countries;
use App\Models\cities;
use App\Models\municipalities;
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
            countries::factory()->count(10)->create();
            cities::factory()->count(10)->create();
            municipalities::factory()->count(10)->create();
    }
}
