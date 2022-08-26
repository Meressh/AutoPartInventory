<?php

namespace Database\Seeders;

use App\Models\Cars;
use App\Models\Parts;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parts::factory()
        ->count(25)
        ->for(Cars::factory()->state([
            'name' => 'Traktor :)',
        ]))
        ->create();
    }
}
