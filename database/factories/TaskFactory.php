<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            'category' => $this->faker->word,
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'deadline' => now()->addDays(rand(1, 10))->toDateString(),
        ];
    }
}
