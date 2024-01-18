<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class citiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id'=> $this->faker->numberBetween(1, 10),
            'name' => $this->faker->city,
        ];
    }
}
