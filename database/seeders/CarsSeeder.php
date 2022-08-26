<?php

namespace Database\Seeders;

use App\Models\Cars;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cars::factory()
        ->count(50)
        ->hasParts(25)
        ->create();
    }
}
