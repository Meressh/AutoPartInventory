<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //!! Not working because of relation
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'serialnumber' => fake()->numerify('##########'), // 1478563201 for example
            'car_id' => fake()->numerify('##########'), // 1478563201 for example
        ];
    }
}
