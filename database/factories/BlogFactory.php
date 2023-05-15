<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'title' => $this->faker->words(3, true),
            'content' => $this->faker->paragraph(1),
            'image' => $this->faker->randomElement(['https://picsum.photos/200', null])
        ];
    }
}
