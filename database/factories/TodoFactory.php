<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(15,2),
            'status' => rand(0, 2),
            'description' => $this->faker->realText(50,2),
            'limit_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 week')
        ];
    }
}
