<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=> $this->faker->unique()->userName,
            'name' => $this->faker->name(),
            'password' => bcrypt('password'),
        ];
    }
}
