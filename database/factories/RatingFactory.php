<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->randomElement([5, 4, 3, 2]),
            'num_day' => rand(1,31),
            'num_month' => rand(1,12),
            'year' => $this->faker->randomElement(['2022','2023','2024','2025','2026','2027','2028'])
        ];
    }
}
