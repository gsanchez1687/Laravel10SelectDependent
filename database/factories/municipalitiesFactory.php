<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class municipalitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         'city_id'=> $this->faker->numberBetween(1, 10),
         'name' => $this->faker->city,
        ];
    }
}
